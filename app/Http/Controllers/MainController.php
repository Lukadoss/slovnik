<?php

namespace App\Http\Controllers;

use App\Districts;
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
        $districts = DB::table('districts')->select(DB::raw('DISTINCT LEFT(municipality, 1) COLLATE utf8_czech_ci'))->get();

        return view('pages.catalog', compact('districts'));
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
