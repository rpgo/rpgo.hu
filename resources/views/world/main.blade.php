@extends('app')

@section('title') @lang('world.main.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="well">
            <ul>
                @foreach($onlineCharacters as $character)
                    <li>{{$character['name']}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection