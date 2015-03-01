@if(can('use.control'))
    <li><a href="{{route('dashboard.main', [$world])}}">@lang('dashboard.main.menu')</a></li>
@endif
<li><a href="{{route('location.show', [$world, $world->rootlocation()])}}">{{$world->rootlocation()->name}}</a></li>
<li><a href="{{route('character.index', $world)}}">@lang('character.index.menu')</a></li>
@if($member)
    <li><a href="{{route('member.index', $world)}}">@lang('member.index.menu')</a></li>
@else
    <li><a href="{{route('member.create', $world)}}">@lang('member.create.menu')</a></li>
@endif
{{-- <li><a href="{{route('character.create', $world)}}">@lang('character.create.menu')</a></li> --}}