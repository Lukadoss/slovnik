<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['registration', 'login']]);
    }

    public function registration()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:30',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:30|confirmed',
            'password_confirmation' => 'required|min:6|max:30'
        ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        return redirect()->home()->with('success', '<strong>Registrace úspěšná!</strong><br>Nyní vyčkejte na potvrzení administrátorem.');
    }

    public function login()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        request('remember')==="on" ? $remember = true : $remember = false;
        $user = User::where('email', request('email'))->first();
        if(!isset($user)) return redirect()->back()->with('error', 'Zadaný uživatel nenalezen.');

        if ($user->auth_level === 0) {
            return redirect()->back()->with('info', 'Uživatel ještě není schválen administrátorem.<br>Kontaktujte administrátora pro schválení registrace.');
        } else {
            if (auth()->attempt(request(['email', 'password']), $remember)) {
                return redirect()->home()->with('success', '<strong>Úspěšně přihlášen!</strong>');
            }
        }
        return redirect()->back()->with('error', 'Špatný email nebo heslo. Zkuste to prosím znovu');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->home();
    }
}
