@extends('app')

@section('title') @lang('member.index.title') @endsection

@section('content')
    <ul>
        @foreach($members as $member)
            <li>{{$member->name}}</li>
        @endforeach
    </ul>
@endsection