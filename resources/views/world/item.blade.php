<div class="well">
    <h4 class="media-heading"><a href="{{route('world.show', $item)}}">{{$item['name']}} <span class="hidden-xs">({{$item['brand']}})</span></a><br /><small><a href="{{route('world.main', $item)}}"><i class="fa fa-link"></i> {{$item['link']}}</a></small></h4>
    <div class="media">
        <a class="pull-left hidden-xs" href="{{route('world.main', $item)}}">
            <img class="media-object" src="{{asset('images/previews/' . $item['slug'] . '.jpg')}}">
        </a>
        <div class="media-body">
            <ul class="list-unstyled list-inline list-group">
                <li class="list-group-item"><span>@lang('world.item.members'): {{$item['member_count']}} </span></li>
                @foreach($item['public_types'] as $type)
                    <li class="hidden-xs list-group-item">{{$type['name']}}: {{$type['count']}}</li>
                @endforeach
                <li class="hidden-xs list-group-item">@lang('world.item.online_members'): {{$item['online_member_count']}}</li>
            </ul>
            <ul class="list-unstyled list-inline list-group">
                <li class="list-group-item"><span>@lang('world.item.characters'): {{$item['character_count']}}</span></li>
                <li class="hidden-xs list-group-item">@lang('world.item.online_characters'): {{$item['online_character_count']}}</li>
            </ul>
        </div>
    </div>
</div>