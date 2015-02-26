@extends('app')

@section('title') @lang('world.index.title') @endsection

@section('content')
    <div class="container-fluid">
        @forelse($worlds as $item)
            @include('world.item', compact('item'))
        @empty
            {{trans('worlds.none')}}
        @endforelse
    </div>
@endsection