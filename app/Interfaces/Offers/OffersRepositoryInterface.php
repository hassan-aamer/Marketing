<?php

namespace App\Interfaces\Offers;

interface OffersRepositoryInterface
{
    // Get all offers
    public function index();

    // Create new offer
    public function create();

    // Update offer
    public function update();

    // Get One offer by ID
    public function show();
}
