@extends('app')

@section('title') {{$location->name}} - @lang('location.show.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="well">
            <h3>{{$location->name}}</h3>
            <div class="btn-group">
                <a href="{{route('location.create', [$world, $location])}}" class="btn btn-default">@lang('location.show.new')</a>
                <a href="{{route('location.edit', [$world, $location])}}" class="btn btn-default">@lang('location.show.edit')</a>
            </div>
            <ul class="breadcrumb">
                @foreach($location->supralocations as $breadcrumb)
                    <li><a href="{{route('location.show', [$world, $breadcrumb])}}">{{$breadcrumb->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            @if(count($location->children()))
                <div class="sub-header">
                    <h3>@lang('location.show.sublocations')</h3>
                </div>
                @foreach($location->children() as $sublocation)
                    <div class="well"><a href="{{route('location.show', [$world, $sublocation])}}">{{$sublocation->name}}</a></div>
                @endforeach
            @endif
        </div>
    </div>
@endsection