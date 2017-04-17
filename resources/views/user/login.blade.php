@extends('layout.master')
@section('content')
    <div class="mdl-grid">
        <form action="/login" method="post" class="mdl-cell mdl-cell--4-col mdl-cell--4-offset mdl-grid mdl-color--white mdl-shadow--2dp">
            {{ csrf_field() }}
            <h4 class="mdl-cell--12-col">Přihlášení uživatele</h4>

            <label class="mdl-cell mdl-cell--4-col textLabel">Email:</label>
            <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}" pattern="[a-zA-Z0-9-_]*@[a-zA-Z0-9-_]*\.[a-z]{2,4}">
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

            <button type="submit" class="mdl-button mdl-js-button mdl-cell--3-offset mdl-cell--6-col mdl-button--raised mdl-button--accent">Vytvoř nový účet</button>
        </form>
    </div>
    <link rel="stylesheet" href="css/registerForm.css">
@endsection
