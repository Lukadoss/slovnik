@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--4-col">
            <form action="#" style="padding: 0 5%;" class="mdl-grid mdl-shadow--6dp mdl-color--white">
                <div class="mdl-textfield mdl-js-textfield mdl-cell--8-col mdl-cell">
                    <input class="mdl-textfield__input" type="text" id="searchTerm">
                    <label class="mdl-textfield__label" for="searchTerm">Hledané heslo</label>
                </div>
                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--4-col mdl-cell--middle mdl-cell--2-offset-tablet">
                    <i class="material-icons">search</i> Hledej
                </button>
            </form>

            @if (session('success'))
                <div class="mdl-cell mdl-cell--12-col mdl-shadow--6dp mdl-color--green-400 mdl-color-text--primary-contrast" style="margin-top: 10px; text-align: center">
                    <?php echo session('success') ?>
                </div>
            @endif
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>
@endsection
