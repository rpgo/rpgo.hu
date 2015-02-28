@extends('app')

@section('title') @lang('world.main.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="well">
            @if( ! $world->published_at)
                @include('world.publish')
            @endif
        </div>
        <div>
            {{can('access.control')}}
        </div>
    </div>
@endsection