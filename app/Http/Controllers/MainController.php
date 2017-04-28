<?php

namespace App\Http\Controllers;

use App\Term;
use Carbon\Carbon;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class MainController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct(Guard $auth = null, PasswordBroker $passwords = null)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;

        $this->middleware('guest', ['only' => ['register', 'login', 'showSendEmail', 'showResetForm']]);
    }


    public function index()
    {
        return view('main.index');
    }

    public function register()
    {
        return view('user.registration');
    }

    public function login()
    {
        return view('user.login');
    }

    public function showSendEmail(){
        return view('password.passReset');
    }

    public function showResetForm(Request $request, $token = null){
        return view('password.reset', compact('request', 'token'));
    }

    public function termDetail($id){
        $term = Term::findOrFail($id);
        $term->last_find = Carbon::now();
        $term->save();
        $district = $term->district;

        return view('term.detail', compact('term', 'district'));
    }

    public function searchTerms(){
        $terms = Term::where('term', 'LIKE', '%'.request('searchTerm').'%')->where('accepted', '1')->get();
        $alphabet = $this->getAlphabet();
        return view('main.catalog', compact('alphabet', 'terms'));
    }

    public function showTerms($sign = null)
    {
        $alphabet = $this->getAlphabet();
        $sign===null ? $terms = Term::where('term', 'LIKE', $alphabet[0].'%')->where('accepted', '1')->get() : $terms = Term::where('term', 'LIKE', $sign.'%')->where('accepted', '1')->get();
        return view('main.catalog', compact('alphabet', 'terms'));
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
        $terms = Term::orderBy('term', 'asc')->where('accepted', '1')->get();
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
