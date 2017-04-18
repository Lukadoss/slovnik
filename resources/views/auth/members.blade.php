@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        @if(auth()->user()->isAdmin())
        <div class="mdl-cell mdl-cell--2-col">
            <div class="mdl-color--white mdl mdl-grid mdl-shadow--2dp">
                <div style="text-align: center" class="mdl-cell mdl-cell--12-col"><h4>Vyberte akci</h4></div>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-1">
                    <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" checked>
                    <span class="mdl-radio__label">Zobrazit profil uživatele</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-2">
                    <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2">
                    <span class="mdl-radio__label">Editovat uživatele</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-3">
                    <input type="radio" id="option-3" class="mdl-radio__button" name="options" value="3">
                    <span class="mdl-radio__label">Smazat uživatele</span>
                </label>
            </div>
        </div>
        @else
            <div class="mdl-layout-spacer"></div>
        @endif
        <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--8-col mdl-shadow--2dp mdl-color--white">
            <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Uživatel</th>
                <th class="mdl-data-table__cell--non-numeric">Správce oblastí</th>
                <th class="mdl-data-table__cell--non-numeric">Původní bydliště</th>
                <th class="mdl-data-table__cell--non-numeric">Momentální bydliště</th>
                <th>Rok narození</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr id="{{$user->id}}" class="clickable" about="{{$user->name}}">
                    <td class="mdl-data-table__cell--non-numeric">{{$user->name}}</td>
                    <td class="mdl-data-table__cell--non-numeric">{{$user->getUserCities()}}</td>
                    <td class="mdl-data-table__cell--non-numeric">@if(isset($user->native)){{$user->getNativeCity->municipality}} @else neuvedeno @endif</td>
                    <td class="mdl-data-table__cell--non-numeric">@if(isset($user->current_city)){{$user->getCurrCity->municipality}} @else neuvedeno @endif</td>
                    <td>@if(isset($user->year_of_birth)){{$user->year_of_birth}} @else neuvedeno @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mdl-layout-spacer"></div>
    </div>

    <dialog class="mdl-dialog">
        <form class="yolo" action="/members" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <h4 class="rolo" style="text-align: center"></h4>
            <div class="mdl-dialog__content">
                <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                    <label class="mdl-textfield__label" for="password">Heslo pro kontrolu:</label>
                    <input class="mdl-textfield__input" type="password" id="password" name="password">
                    <span class="error">{{$errors->first('password')}}</span>
                </div>
            </div>
            <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                <button type="submit" class="mdl-button">Smazat uživatele</button>
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
                                location.href = "/profile/" + id;
                                break;
                            case 2:
                                location.href = "/admin/editU-" + id;
                                break;
                            case 3:
                                dialogPolyfill.registerDialog(dialog);
                                dialog.showModal();
                                $(".yolo").attr("action", "/admin/deleteU-" + id);
                                $(".rolo").text(name);
                                break;
                            default:
                                location.href = "/profile/" + id;
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
