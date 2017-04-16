<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <img src="{{asset('images/zcu-logo.png')}}" style="height: 100%;">
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="/">Vyhledávač</a>
            <a class="mdl-navigation__link" href="/list">Rejstřík</a>
            <a class="mdl-navigation__link" href="/comments">Vzkazy</a>
        </nav>

        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation">
            @if(auth()->check())
                <a class="mdl-navigation__link" href="/profile" style="font-size: 24px">{{auth()->user()->name}}</a>
                <button id="demo-menu-lower-right"
                        class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="material-icons">more_vert</i>
                </button>

                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    for="demo-menu-lower-right">
                    <a class="mdl-menu__item mdl-menu__item--full-bleed-divider" href="/profile/settings">Nastavení</a>
                    <a class="mdl-menu__item" href="/members">Seznam uživatelů</a>
                    <a class="mdl-menu__item mdl-menu__item--full-bleed-divider" href="/districts">Seznam měst</a>
                    <a class="mdl-menu__item" href="/logout">Odhlásit</a>
                </ul>
            @else
                @if(Request::segment(1)!=='register')<a id="show-dialog" class="mdl-navigation__link" href="#">Přihlásit</a>@endif
                <a class="mdl-navigation__link" href="/register">Registrovat</a>
            @endif
        </nav>

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
    </div>
    <!-- Tabs -->
    @if(Request::segment(1)==='list')
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