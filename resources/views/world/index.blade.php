@extends('app')

@section('content')
    <ul>
        @foreach($worlds as $world)
            <li>{{$world->name}}</li>
        @endforeach
    </ul>
@endsection