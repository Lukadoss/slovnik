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

        $this->middleware('auth', ['only' => ['showMembers', 'showDistricts']]);
    }

    public function showComments(){
        $comments = Comment::all()->sortByDesc('created_at');
        return view('main.msg_board', compact('comments'));
    }

    public function publishComment(){
        $this->validate(request(), [
            'text' => 'required'
        ]);

//        Comment::create(request()->all());

        return redirect()->back();
    }

    public function showMembers(){
        $users = User::all('id', 'name', 'year_of_birth', 'native', 'current_city', 'auth_level')->where('auth_level','<>', '0');
        $waitingUsers = User::all('id', 'name', 'email', 'auth_level')->where('auth_level', '0');

        return view('auth.members', compact('users', 'waitingUsers'));
    }

    public function showDistricts(){
        $districts = District::all()->take(15);
        return view('auth.districts', compact('districts'));
    }
}
