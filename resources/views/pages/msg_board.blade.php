@extends('layout.master')

@section('content')
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col mdl-shadow--6dp mdl-cell--hide-phone mdl-color--white" style="width: 50%; min-width: 480px; margin: 20px auto;">
                <p>Tady se bude přidávat komentář - formulář add</p>
                <hr>
                @foreach($comments as $comment)
                    <div class="mdl-grid" style="margin: auto; padding: 10px;">
                        <div class="mdl-cell mdl-cell--12-col mdl-color--grey-50">
                            {{$comment->text}}
                            <p style="text-align: right; margin: 0;">napsal <a href="\user\{{$comment->user_id}}">{{$comment->user->name}}</a><br>
                            {{$comment->created_at->diffForHumans()}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
