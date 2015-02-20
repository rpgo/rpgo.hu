@extends('app')

@section('content')
    <ul>
        <li>{{trans('world.name.title')}}: {{$world->name}}</li>
        <li>{{trans('world.brand.title')}}: {{$world->brand}}</li>
        <li>{{trans('world.slug.title')}}: {{$world->slug}}</li>
    </ul>
@endsection