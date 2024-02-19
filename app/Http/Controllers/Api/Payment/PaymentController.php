<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Interfaces\Payment\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $Payment;

    public function __construct(PaymentRepositoryInterface $Payment)
    {
        $this->Payment = $Payment;
    }
    public function create(PaymentRequest $request)
    {
        return $this->Payment->create($request);
    }
}
