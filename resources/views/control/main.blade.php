@extends('app')

@section('title') @lang('control.main.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <ul class="nav nav-stacked">
                    <li class="active"><a href="#">@lang('control.main.menu')</a></li>
                    <li><a href="#">@lang('roles.index.menu')</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10">
                @include('world.publish')
            </div>
        </div>
    </div>
@endsection