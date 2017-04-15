<?php

namespace App\Http\Controllers;

use App\Districts;
use Carbon\Carbon;
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
        $this->middleware('auth', ['except' => 'showMember']);
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

    public function showSettings(){
        $user = auth()->user();
        $towns = Districts::all();
        return view('user.settings', compact('user', 'towns'));
    }

    public function showSensSettings(){
        $user = auth()->user();
        return view('user.sensitiveSettings', compact('user'));
    }

    public function editUser(){
        $this->validate(request(), [
            'name' => 'nullable|min:3',
            'year' => 'nullable|numeric|digits:4|min:1800|max:'.Carbon::now()->year,
            'native' => 'nullable|exists:districts,id',
            'curr_city' => 'nullable|exists:districts,id'
        ]);
        $user = auth()->user();
        if (request()->has('name')){
            $user->name = request('name');
        }
        if (request()->has('year')){
            $user->year_of_birth = request('year');
        }
        if (request()->has('native')){
            $user->native = request('native');
        }
        if (request()->has('curr_city')){
            $user->current_city = request('curr_city');
        }
        $user->save();

        return redirect('/profile/settings')->with('status', 'Profile updated!');
    }

}
