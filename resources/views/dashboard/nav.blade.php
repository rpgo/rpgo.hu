<ul class="nav nav-stacked">
    <li class="active"><a href="{{route('dashboard.main', $world)}}">@lang('dashboard.sidebar.overview')</a></li>
    <li><a href="{{route('settings.edit', $world)}}">@lang('dashboard.sidebar.settings')</a></li>
    <li><a href="{{route('role.dashboard', $world)}}">@lang('dashboard.sidebar.roles')</a></li>
    <li><a href="{{route('community.dashboard', $world)}}">@lang('dashboard.sidebar.communities')</a></li>
</ul>