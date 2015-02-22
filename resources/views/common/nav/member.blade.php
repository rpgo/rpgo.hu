<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $member->name }} <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('member.show', [$world, $member])}}">@lang('member.show.menu')</a></li>
        @include('common.nav.logout')
    </ul>
</li>