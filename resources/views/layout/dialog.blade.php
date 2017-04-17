<dialog class="mdl-dialog">
    <form action="/login" method="post">
        {{ csrf_field() }}

        <div class="mdl-dialog__content">
            <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                <label class="mdl-textfield__label" for="email">Email:</label>
                <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}" pattern="[a-zA-Z0-9-_]*@[a-zA-Z0-9-_]*\.[a-z]{2,4}">
                <span class="mdl-textfield__error"> Není validní email!</span>
                @if(count($errors)) @foreach($errors->default->get('email') as $error)
                    <span class="error">{{$error}}</span>@break
                @endforeach @endif
            </div>
            <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                <label class="mdl-textfield__label" for="password">Heslo:</label>
                <input class="mdl-textfield__input" type="password" id="password" name="password">
                @if(count($errors)) @foreach($errors->default->get('password') as $error)
                    <span class="error">{{$error}}</span>@break
                @endforeach @endif
            </div>
        </div>
        <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
            <button type="submit" class="mdl-button">Přihlásit</button>
            <button type="button" class="mdl-button close">Zavřít</button>
        </div>
    </form>

</dialog>
<script>
    var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-dialog');
    if (showDialogButton !== null) {
        if (!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function () {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function () {
            dialog.close();
        });
    }
</script>