@extends('app')

@section('title') {{ $world->name }} - @lang('world.show.title') @endsection

@section('content')
    <ul>
        <li>{{trans('world.name.title')}}: {{$world->name}}</li>
        <li>{{trans('world.brand.title')}}: {{$world->brand}}</li>
        <li>{{trans('world.slug.title')}}: {{$world->slug}}</li>
        <li>{{trans('world.creator.title')}}: {{$world->creator->name}}</li>
        <li>{{trans('member.count.title')}}: {{$world->members()->count()}}</li>
    </ul>
@endsection