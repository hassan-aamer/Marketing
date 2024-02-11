<?php

namespace App\Interfaces\Reviews;

interface ReviewsRepositoryInterface
{
    public function index();
    public function create();
    public function update();
    public function show();
}
