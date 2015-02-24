@extends('app')

@section('title') @lang('member.index.title') @endsection

@section('content')
    <ul>
        @foreach($members as $member)
            <li>{{$member->name}} ({{join(', ', $member->roles->lists('name_solo'))}})</li>
        @endforeach
    </ul>
@endsection