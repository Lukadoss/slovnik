@extends('layout.master')
@section('content')
    <div class="mdl-grid">
        <form action="/hovno" method="post" class="mdl-grid">
            {{ csrf_field() }}
            <div class="mdl-cell mdl-cell--4-col">
                <div class="mdl-grid mdl-color--white mdl-shadow--2dp">
                    <h6 class="mdl-cell--12-col mdl-cell" style="margin-top: 50px">Základní informace
                        <hr>
                    </h6>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Heslo<span style="color: red">*</span>:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input type="text" class="mdl-textfield__input" id="name" name="name" value="{{ old('name') }}">
                        <label class="mdl-textfield__label" for="name">Heslo</label>
                        <span class="error">{{$errors->first('name')}}</span>
                    </div>
                    <label class="mdl-cell mdl-cell--4-col textLabel">Výslovnost:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('name') }}">
                        <label class="mdl-textfield__label" for="email">jan.novy@seznam.cz</label>
                        <span class="error">{{$errors->first('email')}}</span>
                    </div>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Původ:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                        <label class="mdl-textfield__label" for="password"></label>
                        <span class="error">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="height: 60%;"></div>
            </div>
            <div class="mdl-cell mdl-cell--4-col mdl-grid mdl-color--white mdl-shadow--2dp">
                <h6 class="mdl-cell--12-col mdl-cell" style="margin-top: 50px">Podrobné informace
                    <hr>
                </h6>

                <label class="mdl-cell mdl-cell--4-col textLabel">Význam:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Oblast užití:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Výslovnost:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Příklad ve větě:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Exemplifikace:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Příznak:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Synonymum:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Thesaurus:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">
                    <label class="mdl-textfield__label" for="password"></label>
                    <span class="error">{{$errors->first('password')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Audio soubor:</label>
                <div class="mdl-cell--8-col mdl-cell">
                    <button style="margin: auto;" id="but" type="button" class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised  mdl-js-ripple-effect">
                        <i class="material-icons">add</i>
                    </button>
                </div>
                <input type="hidden" id="password_confirmation" name="password_confirmation">
                <button type="submit" class="mdl-button mdl-js-button mdl-cell--3-offset-desktop mdl-cell--1-offset-tablet mdl-cell--middle mdl-cell--6-col mdl-button--raised mdl-button--accent">
                    Přiřadit slovní druh
                </button>
            </div>
            <div class="mdl-cell mdl-cell--4-col">
                <div class="mdl-grid mdl-color--white mdl-shadow--2dp">
                    <h6 class="mdl-cell--12-col mdl-cell" style="margin-top: 50px">Slovní druh
                        <hr>
                    </h6>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Slovní druh<span style="color: red">*</span>:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" id="country" name="country" value="Podstatné jméno" type="text" readonly tabIndex="-1" data-val="1"/>
                        <label class="mdl-textfield__label" for="country"></label>
                        <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu" for="country">
                            <li class="mdl-menu__item" data-val="1">Podstatné jméno</li>
                            <li class="mdl-menu__item" data-val="2">Přídavné jméno</li>
                            <li class="mdl-menu__item" data-val="3">Zájmeno</li>
                            <li class="mdl-menu__item" data-val="4">Číslovka</li>
                            <li class="mdl-menu__item" data-val="5">Sloveso</li>
                            <li class="mdl-menu__item" data-val="6">Příslovec</li>
                            <li class="mdl-menu__item" data-val="7">Předložka</li>
                            <li class="mdl-menu__item" data-val="8">Spojka</li>
                            <li class="mdl-menu__item" data-val="9">Částice</li>
                            <li class="mdl-menu__item" data-val="10">Citoslovce</li>
                        </ul>
                    </div>
                    <div class="mdl-layout-spacer"></div>

                    {{--<label class="mdl-cell mdl-cell--4-col textLabel">Sloveso_gender<span style="color: red">*</span>:</label>--}}
                    {{--<div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">--}}
                        {{--<input type="text" class="mdl-textfield__input" id="name" name="name" value="{{ old('name') }}">--}}
                        {{--<label class="mdl-textfield__label" for="name">Heslo</label>--}}
                        {{--<span class="error">{{$errors->first('name')}}</span>--}}
                    {{--</div>--}}
                    {{--<label class="mdl-cell mdl-cell--4-col textLabel">Výslovnost:</label>--}}
                    {{--<div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">--}}
                        {{--<input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('name') }}">--}}
                        {{--<label class="mdl-textfield__label" for="email">jan.novy@seznam.cz</label>--}}
                        {{--<span class="error">{{$errors->first('email')}}</span>--}}
                    {{--</div>--}}

                    {{--<label class="mdl-cell mdl-cell--4-col textLabel">Původ:</label>--}}
                    {{--<div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">--}}
                        {{--<input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('name') }}">--}}
                        {{--<label class="mdl-textfield__label" for="password"></label>--}}
                        {{--<span class="error">{{$errors->first('password')}}</span>--}}
                    {{--</div>--}}
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="height: 60%;"></div>
            </div>

        </form>
    </div>
    <script>
        $("#but").click(function () {

            location.href = '/term/newSpeech';
        });
    </script>
    <link rel="stylesheet" href="{{asset('css/registerForm.css')}}">
    <link rel="stylesheet" href="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.css">
    <script defer src="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.js"></script>
@endsection
