@extends('app')

@section('title') {{$character['name']}} - @lang('character.show.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="well">
            <h2>{{$character['name']}} (@lang('character.show.' . $character['type']))
                <a href="{{route('status.character', [$world, $character])}}"><i class="fa fa-circle" style="color:@if($member['status'] ? $character['status'] : $member['status']) green @else red @endif;"></i></a></h2>
            <div class="row">
                <div class="col-xs-2">
                    <img src="http://placehold.it/200x300" alt=""/>
                </div>
                <div class="col-xs-10">
                    <ul class="list-inline">
                        <li>@lang('character.show.creator'):</li>
                        <li><a href="{{route('member.show', [$world, $character['creator']])}}">{{$character['creator']['name']}}</a></li>
                    </ul>
                    <ul class="list-inline">
                        <li>@choice('character.show.owners', $character['owner_members']->count()):</li>
                        @foreach($character['owner_members'] as $owner)
                            <li><a href="{{route('member.show', [$world, $owner])}}">{{$owner['name']}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="list-inline">
                        <li>@choice('character.show.operators', $character['occupant_members']->count()):</li>
                        @foreach($character['occupant_members'] as $operator)
                            <li><a href="{{route('member.show', [$world, $operator])}}">{{$operator['name']}}</a></li>
                        @endforeach
                    </ul>
                    @if($character['type'] == 'player')
                        @foreach($world['partitions'] as $partition)
                            <ul class="list-inline">
                                <li>{{$partition['name']}}:</li>
                                @foreach($partition['communities'] as $community)
                                    @if($character['communities']->contains($community))
                                        <li>{{$community['name']}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection