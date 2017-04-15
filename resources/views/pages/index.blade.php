@extends('layout.master')

@section('content')
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--6dp mdl-cell--hide-phone mdl-color--white" style="width: 30%; min-width: 480px; margin: 20px auto;">
                <form action="#" style="padding: 0 5%;" class="mdl-grid">
                    <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                        <input class="mdl-textfield__input" type="text" id="searchTerm">
                        <label class="mdl-textfield__label" for="searchTerm">Hledané heslo</label>
                    </div>
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--4-col mdl-cell--middle">
                        <i class="material-icons">search</i> Hledej
                    </button>
                </form>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--24dp mdl-cell--hide-desktop mdl-cell--hide-tablet" style="margin: 20px auto; min-width: 120px;">
                <form action="#" style="padding: 0 5%;">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" id="searchTerm">
                        <label class="mdl-textfield__label" for="searchTerm">Hledané heslo</label>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        <i class="material-icons">search</i> Hledej
                    </button>
                </form>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

        </div>
@endsection
