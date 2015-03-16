<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Karaktereid</a>
    <ul class="dropdown-menu" role="menu">
        @foreach($member['occupied_characters'] as $character)
            <li><a href="">{{$character['name']}}</a></li>
        @endforeach
        <li><a href="{{route('character.create', [$world])}}">Karakteralkotás</a></li>
    </ul>
</li>
<li>
    <a href="{{route('status.toggle', [$world])}}"><i class="fa fa-circle" style="color:@if($member['status']) green @else red @endif;"></i></a>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ $member->name }} <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('member.show', [$world, $member])}}">@lang('member.show.menu')</a></li>
        @include('common.nav.logout')
    </ul>
</li>