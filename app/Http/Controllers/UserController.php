<?php

namespace App\Http\Controllers;

use App\Districts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'showMember']);
    }

    public function showMember($id = 0)
    {
        if (auth()->check() && $id === 0) {
            $user = auth()->user();
            return view('user.profile', compact('user'));
        } else if (DB::table('users')->where('id', $id)->exists()) {
            $user = User::where('id', $id)->first();
            return view('user.profile', compact('user'));
        }

        return redirect()->to('/');
    }

    public function showSettings()
    {
        $user = auth()->user();
        $towns = Districts::all();
        return view('user.settings', compact('user', 'towns'));
    }

    public function showSensSettings()
    {
        $user = auth()->user();
        return view('user.sensitiveSettings', compact('user'));
    }

    public function editUser()
    {
        $this->validate(request(), [
            'name' => 'nullable|min:3',
            'year' => 'nullable|numeric|digits:4|min:1800|max:' . Carbon::now()->year,
            'native' => 'nullable|exists:districts,id',
            'curr_city' => 'nullable|exists:districts,id'
        ]);
        auth()->user()->isAdmin() ? $user = User::find(request('id')) : $user = auth()->user();

        if (request()->has('name') && (request('name') !== $user->name)) {
            $user->name = request('name');
        }
        if (request()->has('year') && (request('year') !== $user->year_of_birth)) {
            $user->year_of_birth = request('year');
        }
        if (request()->has('native') && (request('native') !== $user->native)) {
            $user->native = request('native');
        }
        if (request()->has('curr_city') && (request('curr_city') !== $user->current_city)) {
            $user->current_city = request('curr_city');
        }
        $user->save();

        if(auth()->user()->isAdmin()) return redirect('/members')->with('status', 'Profile updated!');
        return redirect('/profile/settings')->with('status', 'Profile updated!');
    }

    public function editSensUser()
    {
        $this->validate(request(), [
            'oldpassword' => 'required',
            'email' => 'nullable|unique:users|email',
            'password' => 'nullable|min:4|confirmed',
            'password_confirmation' => 'nullable|min:4'
        ]);

        $user = auth()->user();
        if (Hash::check(request('oldpassword'), auth()->user()->password)) {
            if (request()->has('email') && (request('email') !== $user->name)) {
                $user->email = request('email');
            }
            if (request()->has('password')) {
                $user->password = Hash::make(request('password'));
            }

            $user->save();
            return redirect('/profile/settings')->with('status', 'Profile updated!');
        }
        return redirect('/profile/pwd_settings')->with('oldpass', 'Špatné heslo!');
    }

}
