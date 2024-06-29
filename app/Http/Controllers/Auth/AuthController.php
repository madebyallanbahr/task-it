<?php

namespace App\Http\Controllers\Auth;

use App\DTO\UserDTO;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController
{
    public function index() : View
    {
        return view('auth');
    }
    public function login(AuthUserRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
           return redirect()->intended(route('dashboard.index'));
        }

        return back()->withErrors($request->messages());
    }
    public function logout()
    {
      Auth::logout();

      return redirect()->intended(route('login'));
    }
    public function store(StoreUserRequest $request){

    }

}
