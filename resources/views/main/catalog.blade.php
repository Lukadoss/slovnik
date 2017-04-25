@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col page-content mdl-grid">
            @foreach ($terms->chunk(10) as $chunk)
                <ul class="mdl-list mdl-cell mdl-cell--4-col mdl-grid">
                    @foreach($chunk as $term)
                        <li id="{{$term->id}}" class="mdl-list__item mdl-cell mdl-cell--12-col mdl-list__item--two-line clickable mdl-color--grey-50 mdl-shadow--2dp">
                            <span class="mdl-list__item-primary-content">
                            <span>{{$term->term." [".$term->pronunciation."] "}}</span>
                            <span class="mdl-list__item-sub-title">{{$term->context}}</span>
                            </span>
                            <span class="mdl-list__item-secondary-content">
                                <i>{{$term->meaning}}</i>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endforeach
            @if(count($terms)<1)
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cell mdl-cell--10-col mdl-shadow--2dp mdl-color--white" style="padding: 10px; text-align: center">Nebylo nalezeno žádné heslo.</div>
                    <div class="mdl-layout-spacer"></div>
                @endif
        </div>
        @if (session('success'))
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--green-400 mdl-color-text--primary-contrast" style="margin-top: 150px; text-align: center">
                <?php echo session('success') ?>
            </div>
        @endif
        @if (session('info'))
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mdl-color--yellow-400 mdl-color-text--grey-900" style="margin-top: 10px; text-align: center">
                <?php echo session('info') ?>
            </div>
        @endif
    </div>
    <script>
        $(document).ready(function () {
            $('.clickable').click(function () {
                location.href = "/term/"+$(this).attr('id');
            });
        })
    </script>
@endsection
