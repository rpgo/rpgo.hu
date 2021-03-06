@extends('app')

@section('title') {{$location['name']}} - @lang('location.show.title') @endsection

@section('content')
    <div class="jumbotron">
        <div class="container-fluid">
            <h2>{{$location['name']}}</h2>
            <ul class="breadcrumb">
                @foreach($location['supralocations'] as $breadcrumb)
                    <li><a href="{{route('location.show', [$world, $breadcrumb])}}">{{$breadcrumb['name']}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        @if($member)
        <div class="btn-group btn-group-justified">
            <a href="{{route('location.create', [$world, $location])}}" class="btn btn-default"><i class="fa fa-plus"></i><span class="hidden-xs"> @lang('location.show.new')</span></a>
            <a href="{{route('location.rename.form', [$world, $location])}}" class="btn btn-default"><i class="fa fa-pencil"></i><span class="hidden-xs"> @lang('location.show.edit')</span></a>
            @if( ! $world->rootlocation()->equals($location))
                <a href="{{route('location.move', [$world, $location])}}" class="btn btn-default"><i class="fa fa-arrows"></i><span class="hidden-xs"> @lang('location.show.move')</span></a>
                <a href="{{route('location.remove', [$world, $location])}}" class="btn btn-default"><i class="fa fa-times"></i><span class="hidden-xs"> @lang('location.show.remove')</span></a>
            @endif
        </div>
        @endif
        @if(count($location['children']))
            <div class="sub-header">
                <h3>@lang('location.show.sublocations')</h3>
            </div>
            <div class="container-fluid">
                @foreach($location['children'] as $sublocation)
                    <div class="well row">
                        <a href="{{route('location.show', [$world, $sublocation])}}">{{$sublocation['name']}}</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection