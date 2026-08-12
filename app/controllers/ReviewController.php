<?php
/**
 * Controller: Review
 * Toont klantbeoordelingen en verwerkt nieuwe reviews.
 */

declare(strict_types=1);

namespace controllers;

use core\Controller;
use models\Review;

class ReviewController extends Controller
{
    public function index(): void
    {
        $reviewModel = new Review();
        $reviews = $reviewModel->getApproved(20);
        $avgRating = $reviewModel->getAverageRating();
        $reviewCount = $reviewModel->getCount();

        $this->render('reviews/index', [
            'page_title'       => 'Reviews - Demo Barbershop',
            'meta_description' => 'Lees reviews van tevreden klanten van Demo Barbershop. Beoordeling: ' . $avgRating . '/5 sterren.',
            'reviews'      => $reviews,
            'avg_rating'   => $avgRating,
            'review_count' => $reviewCount,
        ]);
    }

    public function store(): void
    {
        // CSRF validatie
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!validateCsrf($csrfToken)) {
            $this->redirect('/reviews', [
                'error' => 'Beveiligingsfout: ongeldige formuliertoken.',
            ]);
            return;
        }

        $input = [
            'customer_name' => $_POST['customer_name'] ?? '',
            'rating'        => $_POST['rating'] ?? '',
            'comment'       => $_POST['comment'] ?? '',
        ];

        $rules = [
            'customer_name' => ['required', 'min:2', 'max:100'],
            'rating'        => ['required'],
            'comment'       => ['required', 'min:10', 'max:1000'],
        ];

        [$validated, $errors] = $this->validateInput($rules, $input);

        if (!empty($errors)) {
            $_SESSION['old_input'] = $validated;
            $_SESSION['errors'] = $errors;
            $this->redirect('/reviews');
            return;
        }

        $validated['rating'] = (int)$validated['rating'];

        $reviewModel = new Review();
        $reviewModel->create($validated);

        $this->redirect('/reviews', [
            'success' => 'Bedankt voor uw review! Deze wordt eerst goedgekeurd door de beheerder.',
        ]);
    }
}
