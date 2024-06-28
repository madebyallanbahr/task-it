<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\View\View;

class AuthController
{
    public function index() : View
    {
        return view('auth');
    }
    public function login(AuthUserRequest $request){

    }
    public function logout(){

    }
    public function store(StoreUserRequest $request){

    }
}
