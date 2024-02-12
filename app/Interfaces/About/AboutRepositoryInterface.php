<?php

namespace App\Interfaces\About;

interface AboutRepositoryInterface
{

    //Update About
    public function update($request, $id);

    // Show About
    public function show($id);
}
