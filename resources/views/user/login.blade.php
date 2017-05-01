@extends('layout.master')
@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--4-col">
            <form action="/login" method="post" class="mdl-grid mdl-color--white mdl-shadow--2dp">
                {{ csrf_field() }}
                <h4 class="mdl-cell--12-col mdl-cell">Přihlášení uživatele</h4>

                <label class="mdl-cell mdl-cell--4-col textLabel">Email:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}">
                    <label class="mdl-textfield__label" for="email"></label>
                    <span class="mdl-textfield__error">Není validní email</span>
                    <span class="error">{{$errors->first('email')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Heslo:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel"></label>
                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-cell--8-col mdl-cell" for="checkbox">
                    <input type="checkbox" id="checkbox" name="remember" class="mdl-checkbox__input">
                    <span class="mdl-checkbox__label">Pamatovat si mě</span>
                </label>
                <a href="/resetPassword" class="mdl-cell mdl-cell--4-col">Zapomněl jsem heslo</a>
                <button name="login" type="submit" class="mdl-button mdl-js-button mdl-cell--3-offset-desktop mdl-cell--1-offset-tablet mdl-cell--6-col mdl-button--raised mdl-button--accent">Přihlásit</button>
            </form>
            @if (session('error'))
                <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--red-500 mdl-color-text--primary-contrast" style="margin-top: 10px; text-align: center">
                    <?php echo session('error') ?>
                </div>
            @endif
            @if (session('info'))
                <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--yellow-400 mdl-color-text--grey-900" style="margin-top: 10px; text-align: center">
                    <?php echo session('info') ?>
                </div>
            @endif
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>
    <link rel="stylesheet" href="{{asset('css/registerForm.css')}}">
@endsection
