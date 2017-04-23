@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--2-col mdl-shadow--2dp mdl-color--white mdl-grid" style="text-align: center;">
            <div class="mdl-cell mdl-cell--12-col">
                <img src="{{asset('images/profile.png')}}" style="width: 50%;  background-color: rgba(0,0,0,0.05)">
            </div>
            <div class="mdl-cell mdl-cell--12-col" style="word-wrap: break-word;">
                <h3 style="margin-bottom: auto; padding-bottom: 0"><strong>{{$user->name}}</strong></h3>
                <h5 style="margin: 10px auto; color: #f82b2b;"><strong>{{$user->getRole()}}</strong></h5>
                @if(auth()->user() == $user)
                    <a type="button" href="/profile/settings" class="mdl-cell--12-col mdl-cell mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Nastavení
                    </a>
                    @if(auth()->user()->isAdmin())
                        <hr>
                        <a type="button" href="/members" class="mdl-cell--12-col mdl-cell mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                            Správa&nbspuživatelů
                        </a>
                        <a type="button" href="/districts" class="mdl-cell--12-col mdl-cell mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                            Správa&nbspměst
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <form method="post" action="/admin/editUD-{{$user->id}}" class="mdl-cell mdl-cell--5-col mdl-grid">
            {{csrf_field()}}
            @foreach($towns->chunk(7) as $item)
                <table class="mdl-data-table mdl-cell mdl-cell--6-col mdl-js-data-table mdl-shadow--2dp mdl-color--white mdl-data-table--selectable">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Vyberte kraj</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $town)
                        @if(isset($checked))
                            @foreach($checked as $check)
                                @if($town->region === $check->region)
                                    <?php $isSel = true; ?>
                                    @break
                                @endif
                            @endforeach
                        @endif
                        <tr id="{{$town->region}}" @if(isset($isSel) && $isSel) class="is-selected" <?php $isSel = false; ?>@endif>
                        <td class="mdl-data-table__cell--non-numeric">{{$town->region}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endforeach
            <input type="hidden" id="str" name="region_name" value="" />
            <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}" />
            <button id="sub" type="submit" class="mdl-button mdl-js-button mdl-cell mdl-cell--4-offset-desktop mdl-cell--1-offset-tablet mdl-cell--4-col mdl-button--raised mdl-button--accent">
                Odeslat
            </button>
        </form>
        <div class="mdl-layout-spacer"></div>
    </div>
    <script>
        $(function () {
            $('#sub').click(function () {
                var regions = [];
                $("tbody").find("tr .is-checked").each(function(){
                    regions.push($(this).parent().parent().attr('id'));
                });
                $('#str').val(regions);
            });
        });
    </script>
@endsection
