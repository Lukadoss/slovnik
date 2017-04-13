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
        $this->middleware('auth', ['only' => 'showSettings']);
    }

    public function showSettings(){
        $user = new User();
        return view('user.settings', compact('user'));
    }

    public function showMember($id = 0){
        if (auth()->check() && $id === 0){
            $user = auth()->user();
            return view('user.profile', compact('user'));
        }
        else if(DB::table('users')->where('id', $id)->exists()){
            $user = User::where('id', $id)->first();
            return view('user.profile', compact('user'));
        }

        return redirect()->to('/');
    }

}
