<?php

namespace App\Interfaces\Reviews;

interface ReviewsRepositoryInterface
{
    // Get All Reviews
    public function index();

    // Create a new review
    public function create();

    // Update a review
    public function update();

    // Get One review By ID
    public function show();

    // Delete a review By ID
    public function delete($id);
}
