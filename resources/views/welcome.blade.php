<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-red.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nařeční slovník ZČU</title>

</head>
<body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--scroll mdl-layout--no-drawer-button">
        <div class="mdl-layout-icon"></div>
        <div class="mdl-layout__header-row">
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="tmpl1">Template 1</a>
                <a class="mdl-navigation__link" href="tmpl2">Template 2</a>
                <a class="mdl-navigation__link" href="tmpl3">Template 3</a>
                <a class="mdl-navigation__link" href="">Rejstřík</a>
                <a class="mdl-navigation__link" href="">Vyhledávač</a>
            </nav>

        </div>
    </header>
    <main>

        <div class="mdl-grid">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                buttonek
            </button>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".ayy").select2({
                        placeholder: 'Select an option',
                        minimumInputLength: 1
                    });
                });
            </script>

            <select class="ayy">
                @foreach($districts as $district)
                    <option>{{$district->municipality}}</option>
                @endforeach
            </select>


        </div>

    </main>


</div>

{{--<footer class="mdl-mini-footer">--}}
{{--<div class="mdl-mini-footer__left-section">--}}
{{--<div class="mdl-logo">Title</div>--}}
{{--<ul class="mdl-mini-footer__link-list">--}}
{{--<li><a href="#">Help</a></li>--}}
{{--<li><a href="#">Privacy & Terms</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</footer>--}}


</body>
</html>