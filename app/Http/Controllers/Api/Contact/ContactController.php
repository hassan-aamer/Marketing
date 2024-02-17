<?php

namespace App\Http\Controllers\Api\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Interfaces\Contact\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $Contact;
    public function __construct(ContactRepositoryInterface $Contact)
    {
        $this->Contact = $Contact;
    }

    public function update(ContactRequest $request, $id)
    {
        return $this->Contact->update($request, $id);
    }
    public function show($id)
    {
        return $this->Contact->show($id);
    }
}
