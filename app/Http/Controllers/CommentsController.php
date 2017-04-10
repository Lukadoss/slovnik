<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        \Carbon\Carbon::setLocale('cs');
        date_default_timezone_set('Europe/Prague');
    }

    public function showAll(){
        $comments = Comment::all();
        return view('pages.msg_board', compact('comments'));
    }
}
