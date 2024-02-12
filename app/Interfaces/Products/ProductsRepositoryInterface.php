<?php

namespace App\Interfaces\Products;

interface ProductsRepositoryInterface
{
    // git All products By Activated
    public function index();

    // git All products
    public function allProducts();

    // Create a new product
    public function create($request);

    // Get one product
    public function show();

    // update one product
    public function update($request,$id);

    // Delete one product
    public function delete($id);
}
