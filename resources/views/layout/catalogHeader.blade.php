<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <img src="images/zcu-logo.png" style="height: 100%;">
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="/">Vyhledávač</a>
            <a class="mdl-navigation__link" href="rejstrik">Rejstřík</a>
            <a class="mdl-navigation__link" href="#">Vzkazy</a>
        </nav>

        <div class="mdl-layout-spacer"></div>


        <div class="mdl-badge mdl-badge--overlap" data-badge="6">
            <button class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">chat_bubble</i>
            </button>
        </div>

        <div class="mdl-badge mdl-badge--overlap" data-badge="1">
            <button class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">notifications</i>
            </button>
        </div>
    </div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <?php
        $i = 97;
        while ($i < (123)){
        ?>
        <a href="#fixed-tab-{{$i-97}}" @if($i==97) class="mdl-layout__tab is-active" @else class="mdl-layout__tab" @endif>{{chr($i)}}</a>
        <?php
        $i++;
        }
        ?>
    </div>
</header>
<div class="mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <nav class="mdl-navigation mdl-color--blue-grey-800">
        <?php
        $i = 97;
        while ($i < (123)){
        ?>
        <a class="mdl-navigation__link" href="">{{chr($i)}}</a>
        <?php
        $i++;
        }
        ?>
    </nav>
</div>