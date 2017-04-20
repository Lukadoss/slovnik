@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--10-col mdl-grid">
            @if(auth()->user()->isAdmin())
                <div class="mdl-cell mdl-cell--2-col">
                    <div class="mdl-color--white mdl mdl-grid mdl-shadow--2dp">
                        <div style="text-align: center" class="mdl-cell mdl-cell--12-col"><h4>Vyberte akci</h4></div>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-1">
                            <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" checked>
                            <span class="mdl-radio__label">Smazat oblast</span>
                        </label>
                        <button id="show-dialog" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--accent mdl-cell mdl-cell--12-col">Přidat novou oblast</button>
                    </div>
                </div>
            @else
                <div class="mdl-layout-spacer"></div>
            @endif
            <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--10-col mdl-shadow--2dp mdl-color--white">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Obec</th>
                    <th class="mdl-data-table__cell--non-numeric">Okres</th>
                    <th class="mdl-data-table__cell--non-numeric">Kraj</th>
                </tr>
                </thead>
                <tbody>
                @foreach($districts as $district)
                    <tr class="clickable" id="{{$district->id}}" about="{{$district->municipality}}">
                        <td class="mdl-data-table__cell--non-numeric">{{$district->municipality}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$district->district}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$district->region}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mdl-layout-spacer"></div>
        @if (session('success'))
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--green-400 mdl-color-text--primary-contrast" style="margin-top: 10px; text-align: center">
                <?php echo session('success') ?>
            </div>
        @endif
        @if (session('info'))
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--yellow-400 mdl-color-text--grey-900" style="margin-top: 10px; text-align: center">
                <?php echo session('info') ?>
            </div>
        @endif
    </div>

    <dialog class="mdl-dialog dialog">
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
                <button type="submit" class="mdl-button">Smazat oblast</button>
                <button type="button" class="mdl-button close">Zavřít</button>
            </div>
        </form>
    </dialog>

    <dialog class="mdl-dialog dialog2">
        <form class="yolo" action="/admin/district" method="post">
            {{ csrf_field() }}

            <div class="mdl-dialog__content">
                <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                    <label class="mdl-textfield__label" for="municipality">Obec:</label>
                    <input class="mdl-textfield__input" type="text" id="municipality" name="municipality">
                    <span class="error">{{$errors->first('municipality')}}</span>
                </div>
            </div>
            <div class="mdl-dialog__content">
                <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                    <label class="mdl-textfield__label" for="district">Okres:</label>
                    <input class="mdl-textfield__input" type="text" id="district" name="district">
                    <span class="error">{{$errors->first('district')}}</span>
                </div>
            </div>
            <div class="mdl-dialog__content">
                <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                    <label class="mdl-textfield__label" for="region">Kraj:</label>
                    <input class="mdl-textfield__input" type="text" id="region" name="region">
                    <span class="error">{{$errors->first('region')}}</span>
                </div>
            </div>
            <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                <button type="submit" class="mdl-button">Přidat oblast</button>
                <button type="button" class="mdl-button close">Zavřít</button>
            </div>
        </form>

    </dialog>

    <script>
        $(document).ready(function () {
            $(".clickable").click(function () {
                var id = $(this).attr('id');
                var name = $(this).attr('about');
                var dialog = document.querySelector('.dialog');

                dialog.querySelector('.close').addEventListener('click', function () {
                    dialog.close();
                });

                jQuery("input[name='options']").each(function () {
                    if (this.checked) {
                        switch (parseInt(this.value)) {
                            case 1:
                                dialogPolyfill.registerDialog(dialog);
                                dialog.showModal();
                                $(".yolo").attr("action", "/admin/deleteD-" + id);
                                $(".rolo").text(name);
                                break;
                            default:
                                location.href = "/members";
                        }
                    }
                });
            });


            var dialog2 = document.querySelector('.dialog2');

            var showDialogButton = document.querySelector('#show-dialog');
            if (showDialogButton !== null) {
                if (!dialog2.showModal) {
                    dialogPolyfill.registerDialog(dialog2);
                }
                showDialogButton.addEventListener('click', function () {
                    dialog2.showModal();
                });
                dialog2.querySelector('.close').addEventListener('click', function () {
                    dialog2.close();
                });
            }
        });
    </script>
@endsection
