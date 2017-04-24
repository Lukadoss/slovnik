@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-offset mdl-cell--2-col mdl-shadow--2dp mdl-color--white" style="text-align: center;">
            <div class="mdl-cell mdl-cell--12-col">
                <img src="{{asset('images/profile.png')}}" style="width: 50%;  background-color: rgba(0,0,0,0.05)">
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-grid" style="word-wrap: break-word;">
                <h3 class="mdl-cell mdl-cell--12-col" style="margin-bottom: auto; padding-bottom: 0"><strong>{{$user->name}}</strong></h3>
                <h5 class="mdl-cell mdl-cell--12-col" style="margin: 10px auto; color: #f82b2b;"><strong>{{$user->getRole()}}</strong></h5>
                <a type="button" href="/profile/pwd_settings" style="visibility: hidden;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--12-col">
                    <i class="material-icons mdl-list__item-icon" style="color: #fffaf1; ">gavel</i> Změna emailu a hesla
                </a>
                <a type="button" href="/profile/settings" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mdl-cell mdl-cell--12-col" style="margin-top: 10px">
                    <i class="material-icons mdl-list__item-icon" style="color: #fffaf1">keyboard_backspace</i> Zpět
                </a>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--5-col mdl-color--white mdl-shadow--2dp mdl-grid test">
            <div class="mdl-cell mdl-cell--12-col" style="text-align: left;">
                <strong style="font-size: 18px;">Změna osobních údajů:</strong><br>
            </div>
            <form id="firstForm" action="/profile/pwd_settings" method="post" class="mdl-grid">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="border-radius: 1px">
                    <label class="mdl-cell mdl-cell--4-col textLabel" for="email">Nový email:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input type="email" class="mdl-textfield__input" id="email" name="email">
                        <span class="error">{{$errors->first('email')}}</span>
                    </div>
                </div>
                <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="border-radius: 1px">

                    <label class="mdl-cell mdl-cell--4-col textLabel">Nové heslo:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="password" id="password" name="password">
                        <label class="mdl-textfield__label" for="password"></label>
                        <span class="error">{{$errors->first('password')}}</span>
                    </div>
                    <label class="mdl-cell mdl-cell--4-col textLabel">Potvrzení nového hesla:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="password" id="password_confirmation" name="password_confirmation">
                        <label class="mdl-textfield__label" for="password_confirmation"></label>
                        <span class="error">{{$errors->first('password_confirmation')}}</span>
                    </div>
                </div>
                <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="border-radius: 1px">
                    <label class="mdl-cell mdl-cell--4-col textLabel" id="labelOldPass" for="oldpassword">Staré heslo<span style="color: red">*</span>:</label>
                    <div class="mdl-tooltip" data-mdl-for="labelOldPass">
                        Nutné pro změnu emailu nebo nového hesla
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="password" id="oldpassword" name="oldpassword">
                        <label class="mdl-textfield__label" for="oldpassword"></label>
                        <span class="error">{{$errors->first('oldpassword')}}{{ session('oldpass') }}</span>
                    </div>
                </div>
                <button type="submit" style="margin-top: 20px" class="mdl-button mdl-js-button mdl-cell--3-offset-desktop mdl-cell--1-offset-tablet mdl-cell--6-col mdl-button--raised mdl-button--accent">Odeslat</button>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="/css/settings.css">
@endsection
