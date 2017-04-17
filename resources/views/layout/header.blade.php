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
                <a class="mdl-navigation__link" href="/login">Přihlásit</a>
                <a class="mdl-navigation__link" href="/register">Registrovat</a>
            @endif
        </nav>
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