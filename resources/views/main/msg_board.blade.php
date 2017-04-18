@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-offset mdl-cell--2-col mdl-shadow--2dp mdl-color--white">
            <form action="/comments" method="post" class="mdl-grid">
                {{ csrf_field() }}
                <div class="mdl-cell mdl-cell--12-col" style="text-align: center"><strong>Vložte nový komentář</strong>
                    <hr>
                </div>
                <input name="user_id" type="hidden" @if(auth()->check()) value="{{auth()->user()->id}} @endif">
                <label for="text" class="mdl-cell mdl-cell--12-col">Komentář:</label>
                <div class="mdl-textfield mdl-js-textfield mdl-cell--12-col mdl-cell">
                    <textarea class="mdl-textfield__input" type="text" rows="3" id="text" name="text"></textarea>
                    <label class="mdl-textfield__label" for="text">Obsah vzkazu</label>
                    <span class="error">{{$errors->first('text')}}</span>
                </div>
                <button type="submit" class="mdl-button mdl-js-button mdl-cell mdl-cell--12-col mdl-button--raised mdl-button--accent">Poslat komentář</button>
            </form>

        </div>
        <div class="mdl-cell mdl-cell--5-col mdl-color--white mdl-shadow--2dp">
            @foreach($comments as $comment)
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col" style="border-width: 1px; border-style: solid; border-color:lightgrey; border-radius: 2px; padding: 10px;">
                        {{$comment->text}}
                        <p style="text-align: right; margin: 0;">napsal
                            @if(isset($comment->user_id))
                                <a href="\profile\{{$comment->user_id}}">{{$comment->user->name}}</a>
                            @else
                                anonym
                            @endif
                            <br>
                            {{$comment->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
