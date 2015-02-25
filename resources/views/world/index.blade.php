@extends('app')

@section('title') @lang('world.index.title') @endsection

@section('content')
    <div class="container-fluid">
        @forelse($worlds as $world)
            <div class="well">
                <div class="media">
                    <a class="pull-left hidden-xs" href="{{route('world.main', $world)}}">
                        <img class="media-object" src="{{asset('images/previews/' . $world->slug . '.jpg')}}">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{route('world.main', $world)}}">{{$world->name}} ({{$world->brand}})</a></h4>
                        <p class="text-right">{{trans('world.creator.title') . ': ' . $world->creator->name}}</p>
                        <ul class="list-unstyled list-inline">
                            <li><span>{{trans('world.item.members') . ': ' . $world->members()->count()}} </span></li>
                            @foreach($world->types->where('secret',0) as $type)
                                <li class="hidden-xs">|</li>
                                <li class="hidden-xs">{{$type->name_group}}: {{$world->members()->ofType($type)->count()}}</li>
                            @endforeach
                        </ul>
                        <ul class="list-inline list-unstyled">
                            <li><span>{{trans('world.item.locations') . ': ' . $world->rootlocation()->sublocations()->count()}} </span></li>
                            <li>|</li>
                            <li>Link: <a href="{{route('world.main', compact('world'))}}">{{$world->slug . '.' . env('APP_DOMAIN')}}</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci est explicabo magnam
                            nam optio recusandae, ut voluptate. Animi aperiam at dolorem esse nobis perferendis quibusdam.
                            Dignissimos dolorum odio reprehenderit! <a href="{{route('world.show', $world)}}">Bővebben...</a></p>
                    </div>
                </div>
            </div>
            <?php unset($world); // It would become a global variable otherwise... ?>
        @empty
            {{trans('worlds.none')}}
        @endforelse
    </div>
@endsection