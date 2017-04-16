<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('cs');
        date_default_timezone_set('Europe/Prague');
    }

    public function showAll(){
        $comments = Comment::all()->sortByDesc('created_at');
        return view('pages.msg_board', compact('comments'));
    }

    public function publishComment(){
        $this->validate(request(), [
            'text' => 'required'
        ]);

        Comment::create(request()->all());

        return redirect()->back();
    }
}
