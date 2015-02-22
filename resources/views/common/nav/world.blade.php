<li><a href="{{route('location.show', [$world, $world->rootlocation()])}}">{{$world->rootlocation()->name}}</a></li>
@if($member)
    <li><a href="{{route('member.index', $world)}}">@lang('member.index.menu')</a></li>
@else
    <li><a href="{{route('member.create', $world)}}">@lang('member.create.menu')</a></li>
@endif
<li><a href="{{route('character.index', $world)}}">@lang('character.index.menu')</a></li>
<li><a href="{{route('character.create', $world)}}">@lang('character.create.menu')</a></li>