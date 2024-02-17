<?php

namespace App\Interfaces\Contact;

interface ContactRepositoryInterface
{
    public function index();

    public function create($request);
}
