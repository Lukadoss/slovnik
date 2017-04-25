@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--10-col mdl-grid">
            @if(count($terms)>0)
                <div class="mdl-cell mdl-cell--2-col">
                    <div class="mdl-color--white mdl-grid mdl-shadow--2dp">
                        <div style="text-align: center" class="mdl-cell mdl-cell--12-col"><h4>Vyberte akci na heslo</h4></div>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-1">
                            <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" checked>
                            <span class="mdl-radio__label">Editovat heslo</span>
                        </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-2">
                            <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2">
                            <span class="mdl-radio__label">Smazat heslo</span>
                        </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-3">
                            <input type="radio" id="option-3" class="mdl-radio__button" name="options" value="3">
                            <span class="mdl-radio__label">Akceptovat heslo</span>
                        </label>
                    </div>
                </div>

                <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--10-col mdl-shadow--2dp mdl-color--white">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Heslo</th>
                        <th class="mdl-data-table__cell--non-numeric">Výslovnost</th>
                        <th class="mdl-data-table__cell--non-numeric">Význam</th>
                        <th class="mdl-data-table__cell--non-numeric">Oblast užití</th>
                        <th class="mdl-data-table__cell--non-numeric">Přidal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($terms as $term)
                        <tr id="{{$term->id}}" class="clickable" about="{{$term->term}}">
                            <td class="mdl-data-table__cell--non-numeric">{{$term->term}}</td>
                            <td class="mdl-data-table__cell--non-numeric">[{{$term->pronunciation}}]</td>
                            <td class="mdl-data-table__cell--non-numeric">
                                @if(strlen($term->meaning)>30)
                                    <?php echo substr($term->meaning, 0, 30) . "..." ?>
                                @else
                                    {{$term->meaning}}
                                @endif
                            </td>
                            <td class="mdl-data-table__cell--non-numeric">
                                @if(strlen($term->district->region)>1){{$term->district->municipality.', '.$term->district->district.', '.$term->district->region}}
                                @else {{$term->district->municipality}}
                                @endif
                            </td>
                            <td class="mdl-data-table__cell--non-numeric">{{$term->user->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="mdl-layout-spacer"></div>
                <div class="mdl-cell mdl-cell--10-col mdl-shadow--2dp mdl-color--white" style="padding: 10px; text-align: center">Momentálně zde nejsou žádná hesla k potvrzení.</div>
            @endif
        </div>
        @if (session('success'))
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--green-500 mdl-color-text--primary-contrast" style="margin-top: 10px; text-align: center">
                <?php echo session('success') ?>
            </div>
        @endif
        @if (session('info'))
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--yellow-400 mdl-color-text--grey-900" style="margin-top: 10px; text-align: center">
                <?php echo session('info') ?>
            </div>
        @endif
        <span class="mdl-layout-spacer"></span>
    </div>
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

    <script>
        $(document).ready(function () {
            $(".clickable").click(function () {
                var id = $(this).attr('id');
                var name = $(this).attr('about');

                jQuery("input[name='options']").each(function () {
                    if (this.checked) {
                        switch (parseInt(this.value)) {
                            case 1:
                                location.href = "/term/edit/" + id;
                                break;
                            case 2:
                                dialogPolyfill.registerDialog(dialog);
                                dialog.showModal();
                                $(".yolo").attr("action", "/term/delete/" + id);
                                $(".rolo").text(name);
                                break;
                            case 3:
                                location.href = "/term/accept/" + id;
                                break;
                            default:
                                location.href = "/term/edit/" + id;
                        }
                    }
                });
            });

            var dialog = document.querySelector('dialog');

            dialog.querySelector('.close').addEventListener('click', function () {
                dialog.close();
            });
        });
    </script>
@endsection
