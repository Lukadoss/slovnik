@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col page-content mdl-color--white mdl-shadow--2dp">
            <div class="mdl-grid">
                <h3 class="mdl-cell mdl-cell--12-col"><strong>{{$term->term}}</strong> &nbsp;<span style="font-size: 28px">{{"[".$term->pronunciation."]"}}</span>&nbsp;@if(isset($term->origin))<span
                            style="font-size: 22px"> z {{$term->origin}}</span>@endif</h3>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Význam:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->meaning}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Příklad ve větě:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->examples}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Kontext:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->context}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Exemplifikace:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->exemplification}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Symptom:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->symptom}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Synonymum:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->synonym}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Thesaurus:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->thesaurus}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Audio záznam:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$meaning->audio_path}}<br>
                    </p>
                </div>
                @if($term->part_of_speech->part_of_speech === "Podstatné jméno")
                    <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                        <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                            Jmenný rod:<br>
                        </p>
                        <p class="mdl-cell mdl-cell--6-col">
                            {{$term->part_of_speech->noun->first()->noun_gender}}<br>
                        </p>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                        <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                            Koncovka 2. pádu:<br>
                        </p>
                        <p class="mdl-cell mdl-cell--6-col">
                            {{$term->part_of_speech->noun->first()->noun_sufix}}<br>
                        </p>
                    </div>
                @elseif ($term->part_of_speech->part_of_speech === "Sloveso")
                    <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                        <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                            Vid:<br>
                        </p>
                        <p class="mdl-cell mdl-cell--6-col">
                            {{$term->part_of_speech->verb->first()->verb_aspect}}<br>
                        </p>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                        <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                            Valence:<br>
                        </p>
                        <p class="mdl-cell mdl-cell--6-col">
                            {{$term->part_of_speech->verb->first()->verb_valence}}<br>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
