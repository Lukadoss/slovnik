<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.index', compact('districts'));
    }

    public function template($id){
        if($id==0) return view('templates.android');
        elseif ($id==1) return view('templates.blog');
        else return view('templates.graphs');
    }
}
