<?php

namespace App\Interfaces\Products;

interface ProductsRepositoryInterface
{
    // git All products
    public function index();

    // Create a new product
    public function create($request);

    // Get one product
    public function show();

    // update one product
    public function update($request);

    // Delete one product
    public function delete($id);
}
