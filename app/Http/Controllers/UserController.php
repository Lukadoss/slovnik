<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function registration(){
        $user = new User;
        $user->name = request('name');
        $user->save();
//        User::create(['name' => request('name')]);
        return redirect('/');
//        dd(request()->all());
    }

    public function login(){
        dd(request()->all());
    }

}
