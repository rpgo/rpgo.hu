<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Játéktér <span class="caret"></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('location.show', [$world, $world->rootlocation()])}}">{{$world->rootlocation()->name}}</a></li>
        <li><a href="{{route('game.index', [$world])}}">@lang('game.index.menu')</a></li>
        <li><a href="{{route('character.index', $world)}}">@lang('character.index.menu')</a></li>
    </ul>
</li>
@if(can('use.control'))
    <li><a href="{{route('dashboard.main', [$world])}}">@lang('dashboard.main.menu')</a></li>
@endif
@if($member)
    <li><a href="{{route('member.index', $world)}}">@lang('member.index.menu')</a></li>
@else
    <li><a href="{{route('member.create', $world)}}">@lang('member.create.menu')</a></li>
@endif