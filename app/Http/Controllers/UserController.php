<?php

namespace App\Http\Controllers;

use App\District;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'showMember']);
    }

    public function showMember($id = 0)
    {
        if (auth()->check() && $id === 0) {
            $user = auth()->user();
            return view('user.profile', compact('user'));
        }else if ($id === 0){
            return redirect()->to('/');
        } else if (DB::table('users')->where('id', $id)->exists()) {
            $user = User::where('id', $id)->first();
            return view('user.profile', compact('user'));
        }
        return redirect()->to('/');
    }

    public function showSettings()
    {
        $user = auth()->user();
        $towns = District::all();
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
            'name' => 'nullable|min:3|max:30',
            'year' => 'nullable|numeric|digits:4|min:' . (Carbon::now()->year-150) . '|max:' . Carbon::now()->year,
            'native' => 'nullable|exists:districts,id',
            'curr_city' => 'nullable|exists:districts,id'
        ]);
        auth()->user()->isAdmin() ? $user = User::findOrFail(request('id')) : $user = auth()->user();

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

        if(auth()->user()->isAdmin()) return redirect('/members')->with('success', 'Uživatel "'. $user->name .'" upraven!');
        return redirect()->back()->with('success', 'Profil aktualizován!');
    }

    public function editSensUser()
    {
        $this->validate(request(), [
            'oldpassword' => 'required',
            'email' => 'nullable|unique:users|email',
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6'
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
            return redirect('/profile/settings')->with('success', 'Profil aktualizován!');
        }
        return redirect('/profile/pwd_settings')->with('oldpass', 'Špatné heslo!');
    }

}
