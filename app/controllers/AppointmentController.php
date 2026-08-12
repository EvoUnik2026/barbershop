<?php
/**
 * Controller: Appointment
 * Afspraak maken - toont formulier en verwerkt aflevering.
 */

declare(strict_types=1);

namespace controllers;

use core\Controller;
use models\Appointment;
use models\Service;

class AppointmentController extends Controller
{
    public function index(): void
    {
        $serviceModel = new Service();
        $services = $serviceModel->getAllForSelect();

        $this->render('appointment/index', [
            'page_title'       => 'Afspraak Maken - Demo Barbershop',
            'meta_description' => 'Plan eenvoudig je afspraak bij Demo Barbershop. Kies je dienst, datum en tijd en reserveer jouw premium grooming sessie.',
            'services' => $services,
        ]);
    }

    public function store(): void
    {
        // CSRF validatie
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!validateCsrf($csrfToken)) {
            $this->redirect('/appointment', [
                'error' => 'Beveiligingsfout: ongeldige formuliertoken. Probeer het opnieuw.',
            ]);
            return;
        }

        // Input valideren
        $input = [
            'first_name'       => $_POST['first_name'] ?? '',
            'last_name'        => $_POST['last_name'] ?? '',
            'email'            => $_POST['email'] ?? '',
            'phone'            => $_POST['phone'] ?? '',
            'service_id'       => $_POST['service_id'] ?? '',
            'appointment_date' => $_POST['appointment_date'] ?? '',
            'appointment_time' => $_POST['appointment_time'] ?? '',
            'notes'            => $_POST['notes'] ?? '',
        ];

        $rules = [
            'first_name'       => ['required', 'min:2', 'max:100'],
            'last_name'        => ['required', 'min:2', 'max:100'],
            'email'            => ['required', 'email'],
            'phone'            => ['required', 'phone'],
            'service_id'       => ['required'],
            'appointment_date' => ['required'],
            'appointment_time' => ['required'],
        ];

        [$validated, $errors] = $this->validateInput($rules, $input);

        if (!empty($errors)) {
            // SlaInvullen in sessie voor hertonen
            $_SESSION['old_input'] = $validated;
            $_SESSION['errors'] = $errors;
            $this->redirect('/appointment');
            return;
        }

        // Afspraak opslaan
        $appointmentModel = new Appointment();
        $appointmentId = $appointmentModel->create($validated);

        $this->redirect('/appointment', [
            'success' => 'Afspraak succesvol gemaakt! We hebben uw afspraak ontvangen en zullen deze bevestigen. U ontvangt een bevestiging per e-mail.',
        ]);
    }
}
