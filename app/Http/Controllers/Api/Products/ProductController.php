<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\Products\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(ProductsRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this ->product->index();
    }
    public function allProducts()
    {
        return $this ->product->allProducts();
    }
    public function show($id)
    {
        return $this ->product->show($id);
    }
    public function create(ProductRequest $request)
    {
        return $this ->product->create($request);
    }
    public function update(ProductRequest $request ,$id)
    {
        return $this ->product->update($request, $id);
    }
    public function delete($id)
    {
        return $this ->product->delete($id);
    }
}
