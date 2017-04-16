@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-offset mdl-cell--2-col mdl-shadow--2dp mdl-color--white mdl-grid" style="text-align: center;">
            <div class="mdl-cell mdl-cell--12-col">
                <img src="{{asset('images/profile.png')}}" style="width: 50%;  background-color: rgba(0,0,0,0.05)">
            </div>
            <div class="mdl-cell mdl-cell--12-col" style="word-wrap: break-word;">
                <h3 style="margin-bottom: auto; padding-bottom: 0"><strong>{{$user->name}}</strong></h3>
                <h5 style="margin: 10px auto; color: #f82b2b;"><strong>{{$user->getRole()}}</strong></h5>
                @if(auth()->user() == $user)
                    <a type="button" href="/profile/settings" class="mdl-cell--12-col mdl-cell mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Nastavení <i class="material-icons mdl-list__item-icon" style="color: #fffaf1">settings</i>
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
        <div class="mdl-cell mdl-cell--5-col mdl-color--white mdl-shadow--2dp">
            <div id="hovno" class="mdl-grid">
            <div class="mdl-cell mdl-cell--6-col" style="text-align: left;">
                <strong style="font-size: 18px;">Základní info</strong><br>
                <p>
                    Rok narození: @if(isset($user->year_of_birth)){{$user->year_of_birth}} @else neuvedeno @endif<br>
                    Původní bydliště: @if(isset($user->native)){{$user->getNativeCity->municipality}} @else neuvedeno @endif<br>
                    Momentální bydliště: @if(isset($user->current_city)){{$user->getCurrCity->municipality}} @else neuvedeno @endif<br>
                </p>
            </div>
            <div class="mdl-cell mdl-cell--6-col">
                @if($user->districtAdmin()->count()>0)
                    <strong style="font-size: 18px;">Správce okresů:</strong>
                    <p style="padding-left: 10px">
                        @foreach($user->districtAdmin as $district)
                            {{$district->district}}<br>
                        @endforeach
                    </p>
                @endif
            </div>
            <div class="mdl-cell--12-col mdl-cell">
                <hr>
                <strong style="font-size: 18px;">Hesla přidaná uživatelem: </strong>
                <ul class="mdl-list">
                    @foreach($user->meanings as $meaning)
                        <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            @if(!$meaning->term->accepted)<i class="material-icons mdl-list__item-icon" style="color: #ff0007;">close</i>
                            @else <i class="material-icons mdl-list__item-icon" style="color: #009813;">check</i>
                            @endif
                            {{$meaning->term->term}}
                        </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
        {{--<script>--}}
            {{--$(document).ready(function(){--}}
                {{--$("#hovno").hide(1000, function () {--}}
                    {{--$("#hovno").show(1000);--}}
                {{--});--}}
            {{--});--}}
        {{--</script>--}}
    </div>
@endsection
