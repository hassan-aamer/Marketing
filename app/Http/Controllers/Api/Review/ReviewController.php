<?php

namespace App\Http\Controllers\Api\Review;

use App\Http\Controllers\Controller;
use App\Interfaces\Reviews\ReviewsRepositoryInterface;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private $review;

    public function __construct(ReviewsRepositoryInterface $review)
    {
        $this->review = $review;
    }
}
