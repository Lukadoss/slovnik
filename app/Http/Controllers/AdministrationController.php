<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMembers(){
        $users = User::all();
        return view('auth_pages.members', compact('users'));
    }

    public function showDistricts(){
        return view('auth_pages.districts');
    }
}
