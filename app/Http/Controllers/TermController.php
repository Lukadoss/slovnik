<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addTerm(){
        return view('term.newTerm');
    }


}
