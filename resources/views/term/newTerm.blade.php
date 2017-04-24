@extends('layout.master')
@section('content')
    <div class="mdl-grid">
        <form action="/term/new" method="post" class="mdl-grid" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mdl-cell mdl-cell--4-col">
                <div class="mdl-grid mdl-color--white mdl-shadow--2dp">
                    <h6 class="mdl-cell--12-col mdl-cell" style="margin-top: 50px">Základní informace
                        <hr>
                    </h6>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Heslo<span style="color: red">*</span>:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input type="text" class="mdl-textfield__input" id="term" name="term" value="{{ old('term') }}">
                        <label class="mdl-textfield__label" for="term"></label>
                        <span class="error">{{$errors->first('term')}}</span>
                    </div>
                    <label class="mdl-cell mdl-cell--4-col textLabel">Výslovnost<span style="color: red">*</span>:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="text" id="pronunciation" name="pronunciation" value="{{ old('pronunciation') }}">
                        <label class="mdl-textfield__label" for="pronunciation"></label>
                        <span class="error">{{$errors->first('pronunciation')}}</span>
                    </div>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Původem z:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="text" id="origin" name="origin" value="{{ old('origin') }}">
                        <label class="mdl-textfield__label" for="origin"></label>
                        <span class="error">{{$errors->first('origin')}}</span>
                    </div>
                    <button type="submit" onclick="sub()" class="mdl-button mdl-js-button mdl-cell--3-offset-desktop mdl-cell--1-offset-tablet mdl-cell--middle mdl-cell--6-col mdl-button--raised mdl-button--accent">
                        Vytvořit nové heslo
                    </button>
                    <script>
                        function sub() {
                            document.getElementById("district").value = document.getElementById("distSel").value;
                        }
                    </script>
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="height: 60%;"></div>
            </div>
            <div class="mdl-cell mdl-cell--4-col mdl-grid mdl-color--white mdl-shadow--2dp">
                <h6 class="mdl-cell--12-col mdl-cell" style="margin-top: 50px">Podrobné informace
                    <hr>
                </h6>

                <label class="mdl-cell mdl-cell--4-col textLabel">Význam<span style="color: red">*</span>:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="meaning" name="meaning" value="{{ old('meaning') }}">
                    <label class="mdl-textfield__label" for="meaning"></label>
                    <span class="error">{{$errors->first('meaning')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Příklad ve větě:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="example" name="example" value="{{ old('example') }}">
                    <label class="mdl-textfield__label" for="example"></label>
                    <span class="error">{{$errors->first('example')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Exemplifikace:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="exemplification" name="exemplification" value="{{ old('exemplification') }}">
                    <label class="mdl-textfield__label" for="exemplification"></label>
                    <span class="error">{{$errors->first('exemplification')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Kontext:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="context" name="context" value="{{ old('context') }}">
                    <label class="mdl-textfield__label" for="context"></label>
                    <span class="error">{{$errors->first('context')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Příznak:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="symptom" name="symptom" value="{{ old('symptom') }}">
                    <label class="mdl-textfield__label" for="symptom"></label>
                    <span class="error">{{$errors->first('symptom')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Synonymum:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="synonym" name="synonym" value="{{ old('synonym') }}">
                    <label class="mdl-textfield__label" for="synonym"></label>
                    <span class="error">{{$errors->first('synonym')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Thesaurus:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="thesaurus" name="thesaurus" value="{{ old('thesaurus') }}">
                    <label class="mdl-textfield__label" for="thesaurus"></label>
                    <span class="error">{{$errors->first('thesaurus')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Oblast užití<span style="color: red">*</span>:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <select id="distSel" class="district" style="width: 100%;">
                        <option selected="selected"></option>
                        @foreach($towns as $town)
                            <option value="{{$town->id}}">{{$town->municipality.", ".$town->region}}</option>
                        @endforeach
                    </select>
                    <input id="district" name="district" type="hidden" value="">
                    <span class="error">{{$errors->first('district')}}</span>
                </div>

                <label class="mdl-cell mdl-cell--4-col textLabel">Audio soubor:</label>
                <div class="mdl-cell--8-col mdl-cell mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input" type="text" id="uploadFile" name="fileUp" readonly/>
                    <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">
                        <i class="material-icons">attach_file</i><input type="file" id="uploadBtn">
                    </div>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col">
                <div class="mdl-grid mdl-color--white mdl-shadow--2dp">
                    <h6 class="mdl-cell--12-col mdl-cell" style="margin-top: 50px">Slovní druh
                        <hr>
                    </h6>

                    <label class="mdl-cell mdl-cell--4-col textLabel">Slovní druh<span style="color: red">*</span>:</label>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell getmdl-select getmdl-select__fullwidth">
                        <input class="mdl-textfield__input" id="pos" name="pos" value="Podstatné jméno" type="text" readonly tabIndex="-1" data-val="1"/>
                        <label class="mdl-textfield__label" for="pos"></label>
                        <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu" for="pos">
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

                    <div id="podstjm" class="mdl-grid" style="padding: 0;">
                        <label class="mdl-cell mdl-cell--4-col textLabel">Jmenný rod:</label>
                        <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                            <input type="text" class="mdl-textfield__input" id="noun_gender" name="noun_gender" value="{{ old('noun_gender') }}">
                            <label class="mdl-textfield__label" for="noun_gender"></label>
                            <span class="error">{{$errors->first('noun_gender')}}</span>
                        </div>
                        <label class="mdl-cell mdl-cell--4-col textLabel">Koncovka 2. pádu:</label>
                        <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                            <input class="mdl-textfield__input" type="text" id="noun_sufix" name="noun_sufix" value="{{ old('noun_sufix') }}">
                            <label class="mdl-textfield__label" for="noun_sufix"></label>
                            <span class="error">{{$errors->first('noun_sufix')}}</span>
                        </div>
                    </div>

                    <div id="sloveso" class="mdl-grid" style="display: none; padding: 0;">
                        <label class="mdl-cell mdl-cell--4-col textLabel">Vid:</label>
                        <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                            <input type="text" class="mdl-textfield__input" id="verb_aspect" name="verb_aspect" value="{{ old('verb_aspect') }}">
                            <label class="mdl-textfield__label" for="verb_aspect"></label>
                            <span class="error">{{$errors->first('verb_aspect')}}</span>
                        </div>
                        <label class="mdl-cell mdl-cell--4-col textLabel">Valence:</label>
                        <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                            <input class="mdl-textfield__input" type="text" id="verb_valence" name="verb_valence" value="{{ old('verb_valence') }}">
                            <label class="mdl-textfield__label" for="verb_valence"></label>
                            <span class="error">{{$errors->first('verb_valence')}}</span>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="height: 60%;"></div>
            </div>

        </form>
        @if (session('success'))
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--green-400 mdl-color-text--primary-contrast" style="margin-top: 150px; text-align: center">
                <?php echo session('success') ?>
            </div>
        @endif
    </div>
    <script>
        $(document).ready(function () {
            document.getElementById("uploadBtn").onchange = function () {
                document.getElementById("uploadFile").value = this.files[0].name;
            };

            $(".district").select2({
                minimumInputLength: 2,
                language: "cs",
                delay: 250
            });

            $('#pos').change(function () {
                if (document.getElementById('pos').value === 'Podstatné jméno') {
                    $("#podstjm").slideDown("slow");
                    $("#sloveso").slideUp("slow");
                }else if(document.getElementById('pos').value === 'Sloveso'){
                    $("#sloveso").slideDown("slow");
                    $("#podstjm").slideUp("slow");
                }else{
                    $("#podstjm").slideUp("slow");
                    $("#sloveso").slideUp("slow");
                }
            });
        });
    </script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/cs.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/registerForm.css')}}">
    <link rel="stylesheet" href="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.css">
    <script defer src="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.js"></script>
@endsection
