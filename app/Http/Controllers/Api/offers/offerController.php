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

    public function create(Request $request)
    {
        return $this->offer->create($request);
    }
    public function update(Request $request , $id)
    {
        return $this->offer->update($request, $id);
    }
}
