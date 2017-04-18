<?php

namespace App\Http\Controllers;

use App\Districts;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Comment;

class PagesController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('cs');
        date_default_timezone_set('Europe/Prague');

        $this->middleware('auth', ['only' => ['showMembers', 'showDistricts']]);
    }

    public function showComments(){
        $comments = Comment::all()->sortByDesc('created_at');
        return view('pages.msg_board', compact('comments'));
    }

    public function publishComment(){
        $this->validate(request(), [
            'text' => 'required'
        ]);

//        Comment::create(request()->all());

        return redirect()->back();
    }

    public function showMembers(){
        $users = User::all('id', 'name', 'year_of_birth', 'native', 'current_city');
        return view('auth_pages.members', compact('users'));
    }

    public function showDistricts(){
        $districts = Districts::all()->where('id', '>', Districts::all()->count()-15)->take(15);
        return view('auth_pages.districts', compact('districts'));
    }
}
