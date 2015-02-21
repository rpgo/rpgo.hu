<li><a href="{{route('world.index')}}">{{trans('world.index.link')}}</a></li>
@if($user)
    <li><a href="{{route('world.create')}}">{{trans('world.create.link')}}</a></li>
@endif