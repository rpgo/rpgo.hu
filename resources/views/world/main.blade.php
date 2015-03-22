@extends('app')

@section('title') @lang('world.main.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="well">

                </div>
            </div>
            <div class="col-md-6">
                <div class="well">
                    <ul class="list-inline">
                        <li>@lang('world.main.online_characters'):</li>
                        @foreach($onlineCharacters as $character)
                            <li><a href="{{route('character.show', [$world, $character])}}">{{$character['name']}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="list-inline">
                        <li>@lang('world.main.online_members'):</li>
                        @foreach($onlineMembers as $online_member)
                            <li><a href="{{route('member.show', [$world, $online_member])}}">{{$online_member['name']}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection