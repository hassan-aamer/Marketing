<?php

namespace App\Interfaces\Offers;

interface OffersRepositoryInterface
{
    public function index();
    public function create();
    public function update();
    public function show();
}
