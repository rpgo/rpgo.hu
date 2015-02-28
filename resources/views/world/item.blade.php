<div class="well">
    <div class="media">
        <a class="pull-left hidden-xs" href="{{route('world.main', $item)}}">
            <img class="media-object" src="{{asset('images/previews/' . $item['slug'] . '.jpg')}}">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{route('world.main', $item)}}">{{$item['name']}} ({{$item['brand']}})</a></h4>
            {{--<p class="text-right">{{trans('world.creator.title') . ': ' . $item->creator->name}}</p>--}}
            <ul class="list-unstyled list-inline">
                <li><span>{{trans('world.item.members') . ': ' . $item->members()->count()}} </span></li>
                @foreach($item['types'] as $type)
                    <li class="hidden-xs">|</li>
                    <li class="hidden-xs">{{$type['name_group']}}: {{$item->members()->ofType($type)->count()}}</li>
                @endforeach
            </ul>
            <ul class="list-inline list-unstyled">
                <li><span>{{trans('world.item.locations') . ': ' . $item->rootlocation()->sublocations()->count()}} </span></li>
                <li>|</li>
                <li>Link: <a href="{{route('world.main', compact('world'))}}">{{$item['slug'] . '.' . env('APP_DOMAIN')}}</a></li>
            </ul>
            <p><a href="{{route('world.show', $item)}}">Bővebben...</a></p>
        </div>
    </div>
</div>