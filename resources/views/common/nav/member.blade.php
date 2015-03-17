<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Karaktereid</a>
    <ul class="dropdown-menu" role="menu">
        <li class="row" style="width: 300px">
            <ul class="list-unstyled col-md-7 col-md-offset-1">
                @foreach($member['occupied_characters'] as $character)
                    <li><a href="">{{$character['name']}}</a></li>
                @endforeach
            </ul>
            <ul class="list-unstyled col-md-3">
                @foreach($member['occupied_characters'] as $character)
                    <li>
                        <a href="{{route('status.character', [$world, $character])}}"><i class="fa fa-circle" style="color:@if($member['status'] ? $character['status'] : $member['status']) green @else red @endif;"></i></a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{route('character.create', [$world])}}">Karakteralkotás</a></li>
    </ul>
</li>
<li>
    <a href="{{route('status.member', [$world])}}"><i class="fa fa-circle" style="color:@if($member['status']) green @else red @endif;"></i></a>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ $member->name }} <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('member.show', [$world, $member])}}">@lang('member.show.menu')</a></li>
        @include('common.nav.logout')
    </ul>
</li>