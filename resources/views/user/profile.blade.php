@extends('layout.master')

@section('content')
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--2-offset mdl-cell--2-col mdl-shadow--2dp mdl-color--white">
                <div class="mdl-cell mdl-cell--12-col" style="text-align: center;">
                   <img src="{{asset('images/profile.png')}}" style="width: 50%;  background-color: rgba(0,0,0,0.05)">
                </div>
                <div class="mdl-cell mdl-cell--12-col" style="word-wrap: break-word;text-align: center">
                    <h3 style="margin-bottom: auto; padding-bottom: 0"><strong>{{$user->name}}</strong></h3>
                    <h5 style="margin: 10px auto; color: #f82b2b;"><strong>{{$user->getRole()}}</strong></h5>
                    <div style="text-align: left; margin-top: 30px; font-size: 16px">
                    @if($user->districtAdmin()->count()>0)
                        Správce okresů:
                        <p style="padding-left: 10px">
                            @foreach($user->districtAdmin as $district)
                                {{$district->district}}<br>
                            @endforeach
                        </p>
                    @endif
                    </div>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--5-col mdl-color--amber mdl-shadow--2dp">
                fwqfqw<br>
                asdasd<br><br><br><br><br><br><br><br>
            </div>
        </div>
@endsection
