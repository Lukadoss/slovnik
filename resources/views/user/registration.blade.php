@extends('layout.master')
@section('content')
    <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--1-offset mdl-shadow--6dp mdl-color--white main-content">
                <form action="/user/register" method="post" class="mdl-grid">
                    {{ csrf_field() }}
                    <h4 class="mdl-cell--12-col">Registrace nového uživatele</h4>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Jméno a příjmení<span style="color: red">*</span>: </label>
                    <fieldset class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input type="text" class="mdl-textfield__input" id="name" name="name">
                        <label class="mdl-textfield__label" for="name">Jan Nový</label>
                    </fieldset>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Email<span style="color: red">*</span>: </label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="email" id="email" name="email" pattern="[a-zA-Z0-9-_]*@[a-zA-Z0-9-_]*\.[a-z]{2,4}">
                        <label class="mdl-textfield__label" for="email">jan.novy@seznam.cz</label>
                        <span class="mdl-textfield__error">Není validní email</span>
                    </div>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Heslo<span style="color: red">*</span>: </label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="password" id="pass" name="pass">
                        <label class="mdl-textfield__label" for="pass"></label>
                    </div>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Potvrzení hesla<span style="color: red">*</span>: </label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="password" id="pass2" name="passConf">
                        <label class="mdl-textfield__label" for="pass2"></label>
                    </div>

                    <button type="submit" class="mdl-button mdl-js-button mdl-cell--3-offset mdl-cell--6-col">Vytvoř nový účet</button>
                </form>

            </div>
        </div>
    <link rel="stylesheet" href="css/registerForm.css">
@endsection
