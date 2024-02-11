<?php

namespace App\Interfaces\Products;

interface ProductsRepositoryInterface
{
    public function index();
    public function create($request);
    public function update();
    public function show();
    public function delete();
}
