@extends('layout.master')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-offset mdl-cell--8-col mdl-shadow--2dp mdl-color--white">
            <ul class="mdl-list">
                <li class="mdl-list__item mdl-list__item--three-line">
                    <span class="mdl-list__item-primary-content">
                      <i class="material-icons mdl-list__item-avatar">person</i>
                      <span>{{$users->first()->name}}</span>
                      <span class="mdl-list__item-text-body">
                        {{$users->first()->districtAdmin->first()->municipality}}
                      </span>
                    </span>
                    <span class="mdl-list__item-secondary-content">
                      <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">star</i></a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
@endsection
