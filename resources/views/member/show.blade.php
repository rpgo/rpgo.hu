@extends('app')

@section('title') {{$member->name}} - @lang('member.show.title') @endsection

@section('content')
    <div class="container-fluid">
        <h2>{{$member['name']}}
            <br/><small>{{implode(', ', $member['roles']->lists('name_solo'))}}</small></h2>
        <h3>@lang('member.show.operated_characters')</h3>
        <hr/>
        <div class="row">
            @foreach($member['occupied_characters'] as $character)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    @include('character.item', ['item' => $character])
            </div>
            @endforeach
        </div>
        <h3>@lang('member.show.owned_characters')</h3>
        <hr/>
        <div class="row">
            @foreach($member['owned_characters'] as $character)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    @include('character.item', ['item' => $character])
                </div>
            @endforeach
        </div>
    </div>
@endsection