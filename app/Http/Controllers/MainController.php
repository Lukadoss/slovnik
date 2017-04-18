<?php

namespace App\Http\Controllers;

use App\Districts;
use App\User;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'register']);
    }

    public function index()
    {
        return view('pages.index', compact('districts'));
    }

    public function template($id)
    {
        if ($id == 0) return view('templates.android');
        elseif ($id == 1) return view('templates.blog');
        else return view('templates.graphs');
    }

    public function showList()
    {
        $districts = DB::table('districts')->distinct()->select(DB::raw('LEFT(municipality, 1) COLLATE utf8_czech_ci'))->get();
        return view('pages.catalog', compact('districts'));
    }

    public function showMembers(){
        $users = User::all('id', 'name', 'year_of_birth', 'native', 'current_city');
        return view('auth_pages.members', compact('users'));
    }

    public function showDistricts(){
        $districts = Districts::all()->where('id', '>', Districts::all()->count()-15)->take(15);
        return view('auth_pages.districts', compact('districts'));
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
