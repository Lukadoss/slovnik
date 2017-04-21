<?php

namespace App\Http\Controllers;

use App\Term;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => ['register', 'login']]);
    }

    public function index()
    {
        return view('main.index');
    }

    public function template($id)
    {
        if ($id == 0) return view('templates.android');
        elseif ($id == 1) return view('templates.blog');
        else return view('templates.graphs');
    }

    public function register()
    {
        return view('user.registration');
    }

    public function login()
    {
        return view('user.login');
    }
}
