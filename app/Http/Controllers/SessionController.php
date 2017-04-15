<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['registration', 'login']]);
    }

    public function registration(){
        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        auth()->login($user);

        return redirect()->to('/profile');
    }

    public function login(){
        if (! auth()->attempt(request(['email', 'password']))){
            return redirect()->to('/');
        }

        return redirect()->home();
    }

    public function logout(){
        auth()->logout();
        return redirect()->home();
    }
}
