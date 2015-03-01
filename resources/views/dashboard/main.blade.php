@extends('dashboard.layout')

@section('subtitle') @lang('dashboard.main.title')@endsection

@section('subcontent')
    @include('world.publish')
@endsection