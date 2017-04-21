@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <?php $first = true; ?>
        @foreach($alphabet as $letter)
            <section @if($first) class="mdl-layout__tab-panel is-active mdl-cell--12-col" <?php $first = false; ?> @else class="mdl-layout__tab-panel" @endif id="terms-{{$letter}}" style="margin: 10px 50px 0 50px;">
                <div class="page-content" style="-webkit-column-count: 10; -moz-column-count: 10; column-count: 15;">
                    @foreach ($terms as $term)
                       {{$term->term}}<br>
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>

@endsection
