<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['only' => ['registration', 'login']]);
    }

    public function registration(){
        $this->validate(request(), [
            'name' => 'required',
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
           return redirect()->to('/register');
        }

        return redirect()->home();
    }

    public function logout(){
        auth()->logout();
        return redirect()->home();
    }

    public function settings(){
        return view('user.settings');
    }

    public function showMember($id = 0){
        $user = new User();
        if (auth()->check() && $id == 0){
            $user = auth()->user();
            return view('user.profile', compact('user'));
        }
        else if(DB::table('users')->where('id', $id)->exists()){
            $user = User::where('id', $id)->first();
            return view('user.profile', compact('user'));
        }

        return view('pages.index');
    }

}
