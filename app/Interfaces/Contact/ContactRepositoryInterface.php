<?php

namespace App\Interfaces\Contact;

interface ContactRepositoryInterface
{

    //Update About
    public function update($request, $id);

    // Show About
    public function show($id);
}
