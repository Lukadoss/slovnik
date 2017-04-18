@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <?php $i = 97;
        while ($i < 123) { ?>
            <section @if($i==97) class="mdl-layout__tab-panel is-active mdl-cell--12-col" @else class="mdl-layout__tab-panel" @endif id="terms-{{chr($i)}}" style="margin: 10px 50px 0 50px;">
                <div class="page-content" style="-webkit-column-count: 10; -moz-column-count: 10; column-count: 15;">
                    <?php
                    foreach ($districts as $v) {
//                        if (substr($v->municipality, 0, 1) === strtoupper(chr($i))) echo $v->municipality.'<br>';

                    }
                    $i++; ?>
                </div>
            </section>
        <?php }?>
    </div>

@endsection
