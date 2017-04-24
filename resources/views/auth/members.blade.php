@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        @if(auth()->user()->isAdmin() && count($waitingUsers)>0)
            <div class="mdl-cell mdl-cell--10-col mdl-grid">
                <div class="mdl-cell mdl-cell--2-col mdl-color--white mdl-grid mdl-shadow--2dp">
                    <div style="text-align: center" class="mdl-cell mdl-cell--12-col"><h4>Schvalování registrace</h4></div>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="opt1">
                        <input type="radio" id="opt1" class="mdl-radio__button" name="regOptions" value="1" checked>
                        <span class="mdl-radio__label">Akceptovat uživatele</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--10-col" for="opt2">
                        <input type="radio" id="opt2" class="mdl-radio__button" name="regOptions" value="2">
                        <span class="mdl-radio__label">Smazat uživatele</span>
                    </label>
                </div>
                <div class="mdl-cell mdl-cell--10-col mdl-grid" style=" padding: 0; margin: 0;">
                    <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--white mdldata">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Uživatel ke schválení</th>
                            <th class="mdl-data-table__cell--non-numeric">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($waitingUsers as $user)
                            <tr id="{{$user->id}}" class="clickableReg" about="{{$user->name}}">
                                <td class="mdl-data-table__cell--non-numeric">{{$user->name}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$user->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if(auth()->user()->isAdmin())
            <div class="mdl-cell mdl-cell--10-col mdl-grid">
                <div class="mdl-cell mdl-cell--2-col">
                    <div class="mdl-color--white mdl-grid mdl-shadow--2dp">
                        <div style="text-align: center" class="mdl-cell mdl-cell--12-col"><h4>Vyberte akci na uživatele</h4></div>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-1">
                            <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" checked>
                            <span class="mdl-radio__label">Zobrazit profil</span>
                        </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-2">
                            <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2">
                            <span class="mdl-radio__label">Editovat údaje</span>
                        </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-3">
                            <input type="radio" id="option-3" class="mdl-radio__button" name="options" value="3">
                            <span class="mdl-radio__label">Přidat správu oblasti</span>
                        </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect mdl-cell mdl-cell--12-col" for="option-4">
                            <input type="radio" id="option-4" class="mdl-radio__button" name="options" value="4">
                            <span class="mdl-radio__label">Smazat</span>
                        </label>
                    </div>
                </div>
                @else
                    <span class="mdl-layout-spacer"></span>
                @endif
                <div class="mdl-cell mdl-cell--10-col mdl-grid" style=" padding: 0; margin: 0;">
                    <table class="mdl-data-table mdl-js-data-table mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--white">
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
                            <tr id="{{$user->id}}" class="clickable" about="{{$user->name}}" @if(!auth()->user()->isAdmin()) onclick="location.href = '/profile/{{$user->id}}'" @endif>
                                <td class="mdl-data-table__cell--non-numeric">{{$user->name}}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{$user->getUserCities()}}</td>
                                <td class="mdl-data-table__cell--non-numeric">@if(isset($user->native)){{$user->getNativeCity->municipality}} @else neuvedeno @endif</td>
                                <td class="mdl-data-table__cell--non-numeric">@if(isset($user->current_city)){{$user->getCurrCity->municipality}} @else neuvedeno @endif</td>
                                <td>@if(isset($user->year_of_birth)){{$user->year_of_birth}} @else neuvedeno @endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mdl-cell mdl-cell--12-col paginate" style="text-align: center;">
                        <a type="button" href="{{$users->previousPageUrl()}}" @if(1 === $users->currentPage()) disabled="true" @endif class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">navigate_before</i>
                        </a>
                        @if($users->currentPage() > 4)
                            <a type="button" href="{{$users->url(1)}}" class="mdl-button mdl-js-button">
                                {{1}}
                            </a>
                            <a type="button" href="{{$users->url(1)}}" class="mdl-button mdl-js-button">
                                {{2}}
                            </a>
                            <a type="button" disabled="true" class="mdl-button mdl-js-button" style="color: black;">
                                . . .
                            </a>
                            <a type="button" href="{{$users->url($users->currentPage()-1)}}" class="mdl-button mdl-js-button">
                                {{$users->currentPage()-1}}
                            </a>
                        @else
                            @for($i=1;$i<=$users->currentPage()-1;$i++)
                                <a type="button" href="{{$users->url($i)}}" class="mdl-button mdl-js-button">
                                    {{$i}}
                                </a>
                            @endfor
                        @endif
                        <a id="dis" type="button" class="mdl-button mdl-js-button" disabled>
                            {{$users->currentPage()}}
                        </a>
                        @if($users->currentPage() < $users->lastPage()-4)
                            <a type="button" href="{{$users->url($users->currentPage()+1)}}" class="mdl-button mdl-js-button">
                                {{$users->currentPage()+1}}
                            </a>
                            <a type="button" disabled="true" class="mdl-button mdl-js-button" style="color: black;">
                                . . .
                            </a>
                            <a type="button" href="{{$users->url($users->lastPage()-1)}}" class="mdl-button mdl-js-button">
                                {{$users->lastPage()-1}}
                            </a>
                            <a type="button" href="{{$users->url($users->lastPage())}}" class="mdl-button mdl-js-button">
                                {{$users->lastPage()}}
                            </a>
                        @else
                            @for($i=$users->currentPage()+1;$i<=$users->lastPage();$i++)
                                <a type="button" href="{{$users->url($i)}}" class="mdl-button mdl-js-button">
                                    {{$i}}
                                </a>
                            @endfor
                        @endif
                        <a type="button" href="{{$users->nextPageUrl()}}" @if($users->lastPage() === $users->currentPage()) disabled="true"
                           @endif class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">navigate_next</i>
                        </a>
                    </div>
                </div>
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
                                location.href = "/admin/editUD-" + id;
                                break;
                            case 4:
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

            $(".clickableReg").click(function () {
                var id = $(this).attr('id');
                var name = $(this).attr('about');

                jQuery("input[name='regOptions']").each(function () {
                    if (this.checked) {
                        switch (parseInt(this.value)) {
                            case 1:
                                location.href = "/admin/authU-" + id;
                                break;
                            case 2:
                                dialogPolyfill.registerDialog(dialog);
                                dialog.showModal();
                                $(".yolo").attr("action", "/admin/deleteU-" + id);
                                $(".rolo").text(name);
                                break;
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
