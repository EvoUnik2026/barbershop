<?php
/**
 * Controller: Contact
 * Contactformulier - toont formulier en verwerkt involingen.
 */

declare(strict_types=1);

namespace controllers;

use core\Controller;
use models\ContactMessage;

class ContactController extends Controller
{
    public function index(): void
    {
        $this->render('contact/index', [
            'page_title'       => 'Contact - Dali The Barber',
            'meta_description' => 'Neem contact op met Dali The Barber in Apeldoorn. Bel +31618737335 of stuur een bericht. Adres: Asselsestraat 26a, 7311 EL Apeldoorn.',
        ]);
    }

    public function store(): void
    {
        // CSRF validatie
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!validateCsrf($csrfToken)) {
            $this->redirect('/contact', [
                'error' => 'Beveiligingsfout: ongeldige formuliertoken.',
            ]);
            return;
        }

        // Input valideren
        $input = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name'  => $_POST['last_name'] ?? '',
            'email'      => $_POST['email'] ?? '',
            'phone'      => $_POST['phone'] ?? '',
            'subject'    => $_POST['subject'] ?? '',
            'message'    => $_POST['message'] ?? '',
        ];

        $rules = [
            'first_name' => ['required', 'min:2', 'max:100'],
            'last_name'  => ['required', 'min:2', 'max:100'],
            'email'      => ['required', 'email'],
            'phone'      => ['required', 'phone'],
            'subject'    => ['required', 'min:3', 'max:200'],
            'message'    => ['required', 'min:10'],
        ];

        [$validated, $errors] = $this->validateInput($rules, $input);

        if (!empty($errors)) {
            $_SESSION['old_input'] = $validated;
            $_SESSION['errors'] = $errors;
            $this->redirect('/contact');
            return;
        }

        // Bericht opslaan
        $contactModel = new ContactMessage();
        $contactModel->create($validated);

        $this->redirect('/contact', [
            'success' => 'Uw bericht is succesvol verzonden! We nemen zo spoedig mogelijk contact met u op.',
        ]);
    }
}
