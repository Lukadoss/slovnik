<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <img src="{{asset('images/zcu-logo.png')}}" style="height: 100%;">
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="/">Vyhledávač</a>
            <a class="mdl-navigation__link" href="/list">Rejstřík</a>
            {{--<a class="mdl-navigation__link" href="/comments">Vzkazy</a>--}}
            @if(auth()->check())
                |<a class="mdl-navigation__link" href="/term">Nové heslo</a>
            @endif
        </nav>
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation">
            @if(auth()->check())
                    <?php
                    $num = (new \App\Http\Controllers\TermController())->getNonCheckTermNum();
                    if ($num>1){?>
                        <a class="mdl-navigation__link" href="/term/waiting" style="font-size: 20px; color: yellow;">
                    <?php
                    }
                    if ($num === 1) {
                        echo $num . ' nové heslo';
                    } elseif ($num <= 4 && $num>1) {
                        echo $num . ' nová hesla';
                    } elseif ($num>4) {
                        echo $num . ' nových hesel';
                    }
                    if($num>1){?> </a> | <?php } ?>

                <a class="mdl-navigation__link" href="/profile" style="font-size: 24px">{{auth()->user()->name}}</a>
                <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
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

    @if(Request::segment(1)==='list')
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <?php
            $alphabet = (new \App\Http\Controllers\TermController())->getAlphabet();
            Request::segment(2) ? $activeSign = Request::segment(2) : $activeSign = $alphabet[0];
            foreach ($alphabet as $letter){
            ?>
            <a href="/list/{{$letter}}" @if($activeSign===$letter) class="mdl-layout__tab is-active" @else class="mdl-layout__tab" @endif>{{$letter}}</a>
            <?php
            }
            ?>
        </div>
    @endif
</header>