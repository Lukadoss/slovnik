<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <img src="images/zcu-logo.png" style="height: 100%;">
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="/">Vyhledávač</a>
            <a class="mdl-navigation__link" href="list">Rejstřík</a>
            <a class="mdl-navigation__link" href="#">Vzkazy</a>
        </nav>

        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation">
            <a id="show-dialog" class="mdl-navigation__link" href="#">Přihlásit</a>
            <a class="mdl-navigation__link" href="register">Registrovat</a>
        </nav>

        <dialog class="mdl-dialog">
            <form action="/user/login" method="post">
                {{ csrf_field() }}

                <div class="mdl-dialog__content">
                    <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                        <label class="mdl-textfield__label" for="email">Email:</label>
                        <input class="mdl-textfield__input" type="email" id="email" pattern="[a-zA-Z0-9-_]*@[a-zA-Z0-9-_]*\.[a-z]{2,4}">
                        <span class="mdl-textfield__error"> Není validní email!</span>
                    </div>
                    <div class="mdl-textfield mdl-textfield--full-width mdl-textfield--floating-label mdl-js-textfield">
                        <label class="mdl-textfield__label" for="password">Heslo:</label>
                        <input class="mdl-textfield__input" type="password" id="password">
                    </div>
                </div>
                <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                    <button type="submit" class="mdl-button" value="login">Přihlásit</button>
                    <button type="button" class="mdl-button close">Zavřít</button>
                </div>
            </form>

        </dialog>
        <script>
            var dialog = document.querySelector('dialog');
            var showDialogButton = document.querySelector('#show-dialog');
            if (!dialog.showModal) {
                dialogPolyfill.registerDialog(dialog);
            }
            showDialogButton.addEventListener('click', function () {
                dialog.showModal();
            });
            dialog.querySelector('.close').addEventListener('click', function () {
                dialog.close();
            });
        </script>
    </div>
    <!-- Tabs -->
    @if(basename(url()->current()) === 'list')
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <?php
                $i = 97;
                while ($i < (123)){
            ?>
                <a href="#terms-{{chr($i)}}" @if($i==97) class="mdl-layout__tab is-active" @else class="mdl-layout__tab" @endif>{{chr($i)}}</a>
            <?php
                $i++;
                }
            ?>
        </div>
    @endif
</header>