@extends('app')

@section('title') @yield('subtitle') - @lang('dashboard.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                @include('dashboard.nav')
            </div>
            <div class="col-sm-9 col-md-10">
                @yield('subcontent')
            </div>
        </div>
    </div>
@endsection