@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--4-col" style="margin-top: 2%">
            <form action="/search" style="padding: 0 5%;" class="mdl-grid mdl-shadow--6dp mdl-color--white">
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell distr" style="display: none;">
                    <select id="distSel" class="district" style="width: 100%;">
                        <option value="" selected="selected">nevybráno</option>
                        @foreach($towns as $town)
                            <option value="{{$town->id}}">{{$town->municipality.", ".$town->region}}</option>
                        @endforeach
                    </select>
                    <input id="district" name="district" type="hidden" value="">
                    <span class="error">{{$errors->first('district')}}</span>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell search">
                    <input class="mdl-textfield__input" type="text" id="searchTerm" name="searchTerm">
                    <label class="mdl-textfield__label" for="searchTerm">Hledané heslo</label>
                </div>

                <button type="submit" onclick="sub()"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--4-col mdl-cell--middle mdl-cell--2-offset-tablet">
                    <i class="material-icons">search</i> Hledej
                </button>
                <script>
                    function sub() {
                        if (document.getElementById("distSel").value !== "")
                            document.getElementById("district").value = document.getElementById("distSel").value;
                        else document.getElementById("district").value = 0;
                    }
                </script>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--4-col" for="opt1">
                    <input type="radio" id="opt1" class="mdl-radio__button" name="filter" value="1" checked>
                    <span class="mdl-radio__label">Heslo</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--4-col" for="opt2">
                    <input type="radio" id="opt2" class="mdl-radio__button" name="filter" value="2">
                    <span class="mdl-radio__label">Význam</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--4-col" for="opt3">
                    <input type="radio" id="opt3" class="mdl-radio__button" name="filter" value="3">
                    <span class="mdl-radio__label">Oblast</span>
                </label>
                <div class="mdl-cell mdl-cell--12-col"></div>
            </form>

            @if (session('success'))
                <div class="mdl-cell mdl-cell--12-col mdl-shadow--6dp mdl-color--green-400 mdl-color-text--primary-contrast" style="margin-top: 10px; text-align: center">
                    <?php echo session('success') ?>
                </div>
            @endif
            @if (session('error'))
                <div class="mdl-cell mdl-cell--12-col mdl-shadow--6dp mdl-color--red mdl-color-text--primary-contrast" style="margin-top: 10px; text-align: center">
                    <?php echo session('error') ?>
                </div>
            @endif
            @if(isset($lastTerms))
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin-top: 10%">
                    <h4 class="mdl-cell mdl-cell--12-col" style="text-align: center">Poslední vyhledaná slova</h4>
                    <hr class="mdl-cell mdl-cell--12-col">
                    <ul class="mdl-list mdl-cell mdl-cell--12-col">
                        @foreach($lastTerms as $term)
                            <li id="{{$term->id}}" class="mdl-list__item mdl-cell mdl-cell--12-col mdl-list__item--two-line clickable mdl-color--grey-50 mdl-shadow--2dp">
                            <span class="mdl-list__item-primary-content">
                                @if(strlen($term->pronunciation)>0)
                                    <span>{{$term->term." [".$term->pronunciation."] "}}</span>
                                @else
                                    <span>{{$term->term}}</span>
                                @endif
                                <span class="mdl-list__item-sub-title">{{$term->context}}</span>
                            </span>
                                <span class="mdl-list__item-secondary-content">
                                <i>{{$term->meaning}}</i>
                            </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>
    <script>
        $(document).ready(function () {
            $(".district").select2({
                minimumInputLength: 2,
                language: "cs",
                delay: 250
            });

            $('.mdl-radio').change(function () {
                if (parseInt($("input:checked").val()) === 1) {
                    $(".search").show();
                    $(".distr").hide();
                } else if (parseInt($("input:checked").val()) === 3) {
                    $(".search").hide();
                    $(".distr").show();
                } else {
                    $(".search").show();
                    $(".distr").hide();
                }
            });

            $('.clickable').click(function () {
                location.href = "/term/" + $(this).attr('id');
            });
        });
    </script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/cs.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"/>
@endsection
