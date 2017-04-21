@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col mdl-color--amber page-content" style="-webkit-column-count: 10; -moz-column-count: 10; column-count: 15;">
            @foreach ($terms as $term)
                {{$term->term}}<br>
            @endforeach
        </div>
    </div>
@endsection
