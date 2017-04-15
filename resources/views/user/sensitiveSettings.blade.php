@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-offset mdl-cell--2-col mdl-shadow--2dp mdl-color--white" style="text-align: center;">
            <div class="mdl-cell mdl-cell--12-col">
                <img src="{{asset('images/profile.png')}}" style="width: 50%;  background-color: rgba(0,0,0,0.05)">
            </div>
            <div class="mdl-cell mdl-cell--12-col" style="word-wrap: break-word;">
                <h3 style="margin-bottom: auto; padding-bottom: 0"><strong>{{$user->name}}</strong></h3>
                <h5 style="margin: 10px auto; color: #f82b2b;"><strong>{{$user->getRole()}}</strong></h5>
                <a type="button" href="/profile/pwd_settings" style="visibility: hidden; width: 100%" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <i class="material-icons mdl-list__item-icon" style="color: #fffaf1; ">gavel</i> Změna emailu a hesla
                </a>
                <a type="button" href="/profile/settings" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" style="margin-top: 10px">
                    <i class="material-icons mdl-list__item-icon" style="color: #fffaf1">keyboard_backspace</i> Zpět
                </a>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--5-col mdl-color--white mdl-shadow--2dp mdl-grid">
            <div class="mdl-cell mdl-cell--12-col" style="text-align: left;">
                <strong style="font-size: 18px;">Změna osobních údajů:</strong><br>
            </div>
            <form id="firstForm" action="/profile/settings" method="post" class="mdl-grid">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <label class="mdl-cell mdl-cell--4-col textLabel" for="name">Nový email:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input type="text" class="mdl-textfield__input" id="name" name="name">
                    <label class="mdl-textfield__label" for="name">{{$user->name}}</label>
                    @if(count($errors)) @foreach($errors->default->get('name') as $error)
                        <span class="error">{{$error}}</span>@break
                    @endforeach @endif
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel" for="year">Nové heslo</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" maxlength="4" id="year" name="year">
                    <label class="mdl-textfield__label" for="year">{{$user->year_of_birth}}</label>
                    <span class="mdl-textfield__error">Zadaná hodnota neni číslo</span>
                    @if(count($errors)) @foreach($errors->default->get('year') as $error)
                        <span class="error">{{$error}}</span>@break
                    @endforeach @endif
                </div>
                <label class="mdl-cell mdl-cell--4-col textLabel" for="native">Znovu nové heslo:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">

                    <input id="native" name="native" type="hidden" value="">
                    @if(count($errors)) @foreach($errors->default->get('native') as $error)
                        <span class="error">{{$error}}</span>@break
                    @endforeach @endif
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel" for="curr_city">Staré heslo:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">

                    <input id="curr_city" name="curr_city" type="hidden" value="">
                    @if(count($errors)) @foreach($errors->default->get('curr_city') as $error)
                        <span class="error">{{$error}}</span>@break
                    @endforeach @endif
                </div>

                <button type="submit" onclick="sub()" class="mdl-button mdl-js-button mdl-cell--3-offset mdl-cell--6-col mdl-button--raised mdl-button--accent">Odeslat</button>
            </form>
        </div>
    </div>

    <script>
        function sub() {
            document.getElementById("native").value = document.getElementById("natsel").value;
            document.getElementById("curr_city").value = document.getElementById("cursel").value;
        }
        $(document).ready(function () {
            $(".native").select2({
                minimumInputLength: 2,
                language: "cs",
                delay: 250
            });
            $(".curr_city").select2({
                minimumInputLength: 2,
                language: "cs",
                delay: 250
            });
        });
    </script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/cs.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"/>
    <link rel="stylesheet" href="/css/settings.css">
@endsection
