@extends('app')

@section('title') Character Index @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <ul>
                @foreach($characters as $character)
                    <li>{{$character['name']}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection