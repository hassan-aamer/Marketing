<?php

namespace App\Interfaces\Auth;

interface AuthRepositoryInterface
{
    // Registers Users
    public function register($request);
    // Login Users
    public function login($request);
    public function logout($request);
    public function update($request, $id);
    public function delete();
    public function allUsers();
}
