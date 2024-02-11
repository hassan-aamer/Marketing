<?php

namespace App\Http\Controllers\Api\offers;

use App\Http\Controllers\Controller;
use App\Interfaces\Offers\OffersRepositoryInterface;
use Illuminate\Http\Request;

class offerController extends Controller
{
    private $offer;

    public function __construct(OffersRepositoryInterface $offer)
    {
        $this->offer = $offer;
    }
}
