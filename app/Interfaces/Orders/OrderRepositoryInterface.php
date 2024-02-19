<?php

namespace App\Interfaces\Orders;

interface OrderRepositoryInterface

{
    public function index();
    public function create($request);
    public function show($id);
    public function delete($id);
}
