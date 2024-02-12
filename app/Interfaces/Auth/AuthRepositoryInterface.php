<?php

namespace App\Interfaces\Auth;

interface AuthRepositoryInterface
{
    // Registers Users
    public function register($request);

    // Login Users
    public function login($request);

    // Logout Users
    public function logout($request);

    // Update Users
    public function update($request, $id);

    // Delete One User by ID
    public function delete($id);

    // Get All Users
    public function allUsers();
}
