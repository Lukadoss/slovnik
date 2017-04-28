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
                @if(auth()->user() == $user)
                    <a type="button" href="/profile/pwd_settings" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--12-col"
                       style="font-size: 0.7vw;">
                        Změna emailu a hesla
                    </a>
                    <a type="button" href="/profile" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mdl-cell mdl-cell--12-col" style="margin-top: 10px">
                        <i class="material-icons mdl-list__item-icon" style="color: #fffaf1">keyboard_backspace</i> Zpět
                    </a>
                @elseif(auth()->user()->isAdmin())
                    <a type="button" href="/members" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mdl-cell mdl-cell--12-col" style="margin-top: 10px">
                        <i class="material-icons mdl-list__item-icon" style="color: #fffaf1">keyboard_backspace</i> Zpět
                    </a>
                @endif
                @if (session('success'))
                    <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--green-400 mdl-color-text--primary-contrast" style="margin-top: 150px; text-align: center">
                        <?php echo session('success') ?>
                    </div>
                @endif
            </div>
        </div>
        <div class="mdl-cell mdl-cell--5-col mdl-color--white mdl-shadow--2dp mdl-grid">
            <div class="mdl-cell mdl-cell--12-col" style="text-align: left;">
                <strong style="font-size: 18px;">Změna osobních údajů:</strong><br>
            </div>
            <form id="firstForm" action="/profile/settings" method="post" class="mdl-grid">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <input name="id" type="hidden" value="{{$user->id}}">

                <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="border-radius: 1px">
                    <label class="mdl-cell mdl-cell--4-col textLabel" for="name">Jméno a příjmení:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input type="text" class="mdl-textfield__input" id="name" name="name" value="{{$user->name}}">
                        <span class="error">{{$errors->first('name')}}</span>
                    </div>
                </div>
                <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="border-radius: 1px">
                    <label class="mdl-cell mdl-cell--4-col textLabel" for="year">Rok narození:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" maxlength="4" id="year" name="year" value="{{$user->year_of_birth}}">
                        <span class="mdl-textfield__error">Zadaná hodnota neni číslo</span>
                        <span class="error">{{$errors->first('year')}}</span>
                    </div>
                </div>
                <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="border-radius: 1px">
                    <label class="mdl-cell mdl-cell--4-col textLabel" for="native">Původní bydliště:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <select id="natsel" class="native" style="width: 100%;">
                            <option selected="selected"></option>
                            @foreach($towns as $town)
                                <option value="{{$town->id}}" @if($user->native===$town->id) selected="selected" @endif>{{$town->municipality.", ".$town->region}}</option>
                            @endforeach
                        </select>
                        <input id="native" name="native" type="hidden" value="">
                        <span class="error">{{$errors->first('native')}}</span>
                    </div>

                    <label class="mdl-cell mdl-cell--4-col textLabel" for="curr_city">Momentální bydliště:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <select id="cursel" class="curr_city" style="width: 100%;">
                            <option selected="selected"></option>
                            @foreach($towns as $town)
                                <option value="{{$town->id}}" @if($user->current_city===$town->id) selected="selected" @endif>{{$town->municipality.", ".$town->region}}</option>
                            @endforeach
                        </select>
                        <input id="curr_city" name="curr_city" type="hidden" value="">
                        <span class="error">{{$errors->first('curr_city')}}</span>
                    </div>
                </div>

                <button type="submit" onclick="sub()" class="mdl-button mdl-js-button mdl-cell--3-offset-desktop mdl-cell--1-offset-tablet mdl-cell--6-col mdl-button--raised mdl-button--accent">
                    Uložit
                </button>
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
    <link rel="stylesheet" href="{{asset('css/settings.css')}}">
@endsection
