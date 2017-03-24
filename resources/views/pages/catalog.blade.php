<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-red.min.css"/>
    <link rel="stylesheet" href="css/dict.css"/>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nařeční slovník</title>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header mdl-layout__header--scroll mdl-layout--no-drawer-button">
    <header class="mdl-layout__header">
        <div class="mdl-layout-icon"></div>
        <div class="mdl-layout__header-row">
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="/">Vyhledávač</a>
                <a class="mdl-navigation__link" href="rejstrik">Rejstřík</a>
            </nav>
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
    <main class="mdl-layout__content">
        <div class="page-content">

        </div>

        <div class="mdl-layout-spacer"></div>
    </main>
@include('default.footer')
