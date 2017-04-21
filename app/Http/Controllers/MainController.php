<?php

namespace App\Http\Controllers;

use App\District;
use App\Term;
use Illuminate\Support\Facades\DB;

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

    public function showList()
    {
        $terms = Term::where('term', 'LIKE', $this->getAlphabet()[0].'%')->get();
        $alphabet = $this->getAlphabet();
        return view('main.catalog', compact('alphabet', 'terms'));
    }

    public function register()
    {
        return view('user.registration');
    }

    public function login()
    {
        return view('user.login');
    }

    private function mb_str_split($string, $split_length = 1)
    {
        if ($split_length == 1) {
            return preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);
        } elseif ($split_length > 1) {
            $return_value = [];
            $string_length = mb_strlen($string, "UTF-8");
            for ($i = 0; $i < $string_length; $i += $split_length) {
                $return_value[] = mb_substr($string, $i, $split_length, "UTF-8");
            }
            return $return_value;
        } else {
            return false;
        }
    }

    public function getAlphabet(){
        $terms = Term::orderBy('term', 'asc')->get();
        $alphabet = array();
        foreach ($terms as $term){
            if (!in_array(mb_strtoupper($this->mb_str_split($term->term)[0]), $alphabet))
            {
                $alphabet[] = mb_strtoupper($this->mb_str_split($term->term)[0]);
            }
        }
        return $alphabet;
    }
}
