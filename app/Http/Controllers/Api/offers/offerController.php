<?php

namespace App\Http\Controllers\Api\offers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Interfaces\Offers\OffersRepositoryInterface;
use Illuminate\Http\Request;

class offerController extends Controller
{
    private $offer;

    public function __construct(OffersRepositoryInterface $offer)
    {
        $this->offer = $offer;
    }

    public function index()
    {
        return $this->offer->index();
    }
    public function allOffers()
    {
        return $this->offer->allOffers();
    }
    public function create(OfferRequest $request)
    {
        return $this->offer->create($request);
    }
    public function update(OfferRequest $request, $id)
    {
        return $this->offer->update($request, $id);
    }
    public function show($id)
    {
        return $this->offer->show($id);
    }
    public function delete($id)
    {
        return $this->offer->delete($id);
    }
}
