<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Interfaces\Orders\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $Order;

    public function __construct(OrderRepositoryInterface $Order)
    {
        $this->Order = $Order;
    }
    public function index()
    {
        return $this->Order->index();
    }
    public function create(OrderRequest $request)
    {
        return $this->Order->create($request);
    }
    public function show($id)
    {
        return $this->Order->show($id);
    }
    public function delete($id)
    {
        return $this->Order->delete($id);
    }
}
