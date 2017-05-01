@extends('layout.master')
@section('content')
    <div class="mdl-grid">
        <form action="/register" method="post" class="mdl-cell mdl-cell--4-col mdl-cell--4-offset mdl-grid mdl-color--white mdl-shadow--2dp">
            {{ csrf_field() }}
            <h4 class="mdl-cell--12-col mdl-cell">Registrace nového uživatele</h4>

            <label class="mdl-cell mdl-cell--4-col textLabel">Jméno a příjmení<span style="color: red">*</span>:</label>
            <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                <input type="text" class="mdl-textfield__input" id="name" name="name" value="{{ old('name') }}">
                <label class="mdl-textfield__label" for="name">Jan Nový</label>
                <span class="error">{{$errors->first('name')}}</span>
            </div>

            <label class="mdl-cell mdl-cell--4-col textLabel">Email<span style="color: red">*</span>:</label>
            <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}">
                <label class="mdl-textfield__label" for="email">jan.novy@email.cz</label>
                <span class="mdl-textfield__error">Není validní email</span>
                <span class="error">{{$errors->first('email')}}</span>
            </div>

            <label class="mdl-cell mdl-cell--4-col textLabel">Heslo<span style="color: red">*</span>:</label>
            <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                <input class="mdl-textfield__input" type="password" id="password" name="password">
                <label class="mdl-textfield__label" for="password"></label>
                <span class="error">{{$errors->first('password')}}</span>
            </div>

            <label class="mdl-cell mdl-cell--4-col textLabel">Potvrzení hesla<span style="color: red">*</span>:</label>
            <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                <input class="mdl-textfield__input" type="password" id="password_confirmation" name="password_confirmation">
                <label class="mdl-textfield__label" for="password_confirmation"></label>
                <span class="error">{{$errors->first('password_confirmation')}}</span>
            </div>

            <button name="create" type="submit" class="mdl-button mdl-js-button mdl-cell--3-offset-desktop mdl-cell--1-offset-tablet mdl-cell--6-col mdl-button--raised mdl-button--accent">Vytvoř nový účet</button>
        </form>

    </div>
    <link rel="stylesheet" href="{{asset('css/registerForm.css')}}">
@endsection
