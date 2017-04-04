@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect mdl-cell--12-col">
        <?php $i = 97;
        while ($i < 123) { ?>
        <div class="mdl-tabs__panel" id="terms-{{chr($i)}}">
            <ul>
                <?php
                foreach ($districts as $v) {
                    if (substr($v->municipality, 0, 1) === strtoupper(chr($i))) echo '<li>'.$v->municipality.'</li>';

                }
                $i++; ?>
            </ul>
        </div>
        <?php }?>
        </div>
    </div>

@endsection
