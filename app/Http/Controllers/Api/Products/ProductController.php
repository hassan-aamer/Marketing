<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Interfaces\Products\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(ProductsRepositoryInterface $product)
    {
        $this->product = $product;
    }
}
