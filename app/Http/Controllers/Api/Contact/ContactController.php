<?php

namespace App\Http\Controllers\Api\Contact;

use App\Http\Controllers\Controller;
use App\Interfaces\Contact\ContactRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $Contact;
    public function __construct(ContactRepositoryInterface $Contact)
    {
        $this->Contact = $Contact;
    }
}
