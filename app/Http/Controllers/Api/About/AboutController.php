<?php

namespace App\Http\Controllers\Api\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Interfaces\About\AboutRepositoryInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $about;
    public function __construct(AboutRepositoryInterface $about)
    {
        $this->about = $about;
    }
    public function update(AboutRequest $request, $id)
    {
        return $this->about->update($request, $id);
    }
    public function show($id)
    {
        return $this->about->show($id);
    }
}
