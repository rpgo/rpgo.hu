@extends('app')

@section('title') @lang('world.main.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="well">
            @include('world.publish')
        </div>
    </div>
@endsection