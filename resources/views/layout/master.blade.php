<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/material.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/dialog-polyfill.css"/>
        <link rel="stylesheet" href="css/dict.css"/>
        <script src="js/dialog-polyfill.js"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nařeční slovník</title>
    </head>

    <body>
        @if(basename(url()->current()) === 'list')
            <?php echo '<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout__header--scroll mdl-layout--no-drawer-button mdl-layout--fixed-tabs">' ?>
        @else
            <?php echo '<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-drawer-button mdl-layout__header--scroll">' ?>
        @endif

        @include('layout.header')

        <main class="mdl-layout__content mdl-color--grey-100">
            @yield('content')
        </main>

        @include('layout.footer')
    <?php echo '</div>' ?>
    </body>

</html>