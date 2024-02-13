<?php

namespace App\Interfaces\Offers;

interface OffersRepositoryInterface
{
    //git All Offers By Activated
    public function index();
    //Get all offers
    public function allOffers();

    // Create new offer
    public function create($request);

    // Update offer
    public function update();

    // Get One offer by ID
    public function show($id);

    // Delete One offer by ID
    public function delete($id);
}
