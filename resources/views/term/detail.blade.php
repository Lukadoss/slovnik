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
                        {{$term->meaning}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Oblast užití:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        @if(strlen($term->district->region)>1){{$term->district->municipality.', '.$term->district->district.', '.$term->district->region}}
                        @else {{$term->district->municipality}}
                        @endif<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Příklad ve větě:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$term->examples}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Kontext:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$term->context}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Exemplifikace:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$term->exemplification}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Symptom:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$term->symptom}}<br>
                    </p>
                </div>

                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Synonymum:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$term->synonym}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Thesaurus:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$term->thesaurus}}<br>
                    </p>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: auto;">
                    <p class="mdl-cell mdl-cell--3-col" style="text-align: right; max-width: 100px;">
                        Audio záznam:<br>
                    </p>
                    <p class="mdl-cell mdl-cell--6-col">
                        {{$term->audio_path}}<br>
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
                @if(auth()->check())
                    @if(auth()->user()->isTermViable($district->region))
                        <div class="mdl-cell mdl-cell--12-col mdl-grid">
                            <button id="{{$term->id}}" type="button" class="mdl-button mdl-js-button mdl-cell mdl-cell--2-col mdl-button--raised mdl-button--primary edit">
                                Editovat
                            </button>
                            <button id="{{$term->id}}" type="button" about="{{$term->term}}" class="mdl-button mdl-js-button mdl-cell mdl-cell--2-col mdl-button--raised mdl-button--accent dial">
                                Smazat
                            </button>
                            <dialog class="mdl-dialog">
                                <form class="yolo" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <h4 class="rolo" style="text-align: center"></h4>
                                    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                                        <button type="submit" class="mdl-button">Smazat heslo</button>
                                        <button type="button" class="mdl-button close">Zavřít</button>
                                    </div>
                                </form>

                            </dialog>
                        </div>
                    @endif
                @endif
                <script>
                    $(document).ready(function () {

                        $(".dial").click(function () {
                            var id = $(this).attr('id');
                            var name = $(this).attr('about');

                            dialogPolyfill.registerDialog(dialog);
                            dialog.showModal();
                            $(".yolo").attr("action", "/term/delete/" + id);
                            $(".rolo").text(name);
                        });

                        $(".edit").click(function () {
                            var id = $(this).attr('id');
                            location.href = "/term/edit/"+ id;
                        });

                        var dialog = document.querySelector('dialog');

                        dialog.querySelector('.close').addEventListener('click', function () {
                            dialog.close();
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
