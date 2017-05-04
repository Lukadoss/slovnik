<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    protected $redirectTo = "/";
    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest');
    }
}