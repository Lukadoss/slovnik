<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.min.css"/>
    <link rel="stylesheet" href="css/dict.css"/>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nařeční slovník</title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout__header--scroll mdl-layout--no-drawer-button mdl-layout--fixed-tabs">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <img src="images/zcu-logo.png" style="height: 100%;">
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="/">Vyhledávač</a>
                <a class="mdl-navigation__link" href="rejstrik">Rejstřík</a>
            </nav>

            <div class="mdl-layout-spacer"></div>

            <div class="mdl-badge" data-badge="6">
                <button class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="material-icons">chat_bubble</i>
                </button>
            </div>

            <div class="mdl-badge" data-badge="1">
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
<body>
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
    <main class="mdl-layout__content">
        <div class="page-content">
        </div>

        <div class="mdl-layout-spacer"></div>
    </main>
@include('default.footer')
