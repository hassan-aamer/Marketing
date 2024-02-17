<?php

namespace App\Interfaces\Contact;

interface ContactRepositoryInterface
{
    public function update($request,$id);

    public function show($id);
}
