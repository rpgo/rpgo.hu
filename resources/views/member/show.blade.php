@extends('app')

@section('title') {{$member->name}} - @lang('member.show.title') @endsection

@section('content')
    <div class="container-fluid">
        {{$member->name}}'s profile goes here soon...
    </div>
@endsection