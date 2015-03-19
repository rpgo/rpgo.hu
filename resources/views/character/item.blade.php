<div class="well">
    <h5><a href="{{route('character.show', [$world, $item])}}">{{$item['name']}} (@lang('character.item.' . $item['type']))</a>
        <i class="fa fa-circle" style="color:@if($member['status'] ? $character['status'] : $member['status']) green @else red @endif;"></i></h5>
    <img src="http://placehold.it/100x150" alt=""/>
</div>