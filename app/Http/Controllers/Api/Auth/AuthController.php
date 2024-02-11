<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Interfaces\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $auth;

    public function __construct(AuthRepositoryInterface $auth)
    {
        $this->auth = $auth;
    }
    // Registers Users
    public function createUser(Request $request)
    {
        return $this->auth->register($request);
    }

    // Login Users
    public function loginUser(Request $request)
    {
        return $this->auth->login($request);
    }

    // Logout Users
    public function logout(Request $request)
    {
        return $this->auth->logout($request);
    }
    public function update(Request $request ,$id)
    {
        return $this->auth->update($request,$id);
    }
    public function allUsers()
    {
        return $this->auth->allUsers();
    }
}
