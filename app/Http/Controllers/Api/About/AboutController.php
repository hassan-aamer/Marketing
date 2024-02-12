<?php

namespace App\Http\Controllers\Api\About;

use App\Http\Controllers\Controller;
use App\Interfaces\About\AboutRepositoryInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $about;
    public function __construct(AboutRepositoryInterface $about)
    {
        $this->about = $about;
    }
    public function update(Request $request, $id)
    {
        return $this->about->update($request, $id);
    }
}
