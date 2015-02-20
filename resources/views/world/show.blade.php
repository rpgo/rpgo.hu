@extends('app')

@section('content')
    <ul>
        <li>{{trans('world.name.title')}}: {{$world->name}}</li>
        <li>{{trans('world.brand.title')}}: {{$world->brand}}</li>
        <li>{{trans('world.slug.title')}}: {{$world->slug}}</li>
        <li>{{trans('world.creator.title')}}: {{$world->creator->name}}</li>
    </ul>
@endsection