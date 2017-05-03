<?php

namespace App\Http\Controllers;

use App\District;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Comment;

class PageController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('cs');
        date_default_timezone_set('Europe/Prague');

        $this->middleware('auth');
    }

    public function showMembers(){
        $users = User::where('auth_level','<>', '0')->paginate(15);
        $waitingUsers = User::all('id', 'name', 'email', 'auth_level')->where('auth_level', '0');

        return view('auth.members', compact('users', 'waitingUsers'));
    }

    public function showDistricts(){
        $districts = District::where('id', '>', '0')->orderBy('municipality', 'asc')->paginate(15);
        return view('auth.districts', compact('districts'));
    }

    public function showNewTerm(){
        $towns = District::all();
        return view('term.newTerm', compact('towns'));
    }
}
