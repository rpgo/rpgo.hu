@extends('app')

@section('title') @lang('dashboard.main.title') - @lang('dashboard.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <ul class="nav nav-stacked">
                    <li class="active"><a href="{{route('dashboard.main', $world)}}">@lang('dashboard.main.sidebar')</a></li>
                    <li><a href="{{route('role.index', $world)}}">@lang('role.index.menu')</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10">
                @include('world.publish')
            </div>
        </div>
    </div>
@endsection