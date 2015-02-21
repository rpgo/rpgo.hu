@if($member)
    <li><a href="{{route('member.index', $world)}}">{{trans('member.index.menu')}}</a></li>
@else
    <li><a href="{{route('member.create', $world)}}">{{trans('member.create.menu')}}</a></li>
@endif
<li><a href="">{{$world->rootlocation()->name}}</a></li>