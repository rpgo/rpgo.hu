@extends('app')

@section('title') @lang('world.index.title') @endsection

@section('content')
    <div class="container-fluid">
        @forelse($worlds as $world)
            <div class="well">
                <div class="media">
                    <a class="pull-left hidden-xs" href="{{route('world.show', compact('world'))}}">
                        <img class="media-object" src="http://placehold.it/130x130">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{route('world.show', compact('world'))}}">{{$world->name}} ({{$world->brand}})</a></h4>
                        <p class="text-right">{{trans('world.creator.title') . ': ' . $world->creator->name}}</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci est explicabo magnam
                            nam optio recusandae, ut voluptate. Animi aperiam at dolorem esse nobis perferendis quibusdam.
                            Dignissimos dolorum odio reprehenderit!</p>
                        <ul class="list-inline list-unstyled">
                            <li><span>{{trans('member.members') . ': ' . $world->members()->count()}} </span></li>
                            <li>|</li>
                            <li>Ugrás: <a href="{{route('world.main', compact('world'))}}">{{$world->slug}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            {{trans('worlds.none')}}
        @endforelse
    </div>
@endsection