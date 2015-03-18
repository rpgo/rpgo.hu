@extends('app')

@section('title') {{$character['name']}} - @lang('character.show.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="well">
            <h2>{{$character['name']}}
                <a href="{{route('status.character', [$world, $character])}}"><i class="fa fa-circle" style="color:@if($member['status'] ? $character['status'] : $member['status']) green @else red @endif;"></i></a></h2>
            <div class="row">
                <div class="col-xs-2">
                    <img src="http://placehold.it/200x300" alt=""/>
                </div>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li>@lang('character.show.operators'):</li>
                        @foreach($character['occupant_members'] as $occupant)
                            <li><a href="{{route('member.show', [$world, $occupant])}}">{{$occupant['name']}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="list-inline">
                        <li>@lang('character.show.owners'):</li>
                        @foreach($character['owner_members'] as $occupant)
                            <li><a href="{{route('member.show', [$world, $occupant])}}">{{$occupant['name']}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection