@if($world)
<div style="margin-top:-20px; margin-bottom: 20px;">
    <a href="{{route('world.main', [$world])}}">
        <img src="http://placehold.it/1000x150" class="img-responsive center-block"/>
    </a>
</div>
@endif