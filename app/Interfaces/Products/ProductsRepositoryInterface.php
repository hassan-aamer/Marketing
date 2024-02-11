<?php

namespace App\Interfaces\Products;

interface ProductsRepositoryInterface
{
    public function index();
    public function create();
    public function update();
    public function show();
}
