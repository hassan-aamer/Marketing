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
    public function show()
    {
        return $this ->product->show();
    }
    public function create(ProductRequest $request)
    {
        return $this ->product->create($request);
    }
    public function update()
    {
        return $this ->product->update();
    }
    public function delete()
    {
        return $this ->product->delete();
    }
}
