<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registration(){
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User();

        $user->name = request()->get('name');
        $user->email = request()->get('email');
        $user->password = Hash::make(request()->get('password'));

        $user->save();

        return redirect('/');
    }

    public function login(){
        dd(request()->all());
    }

}
