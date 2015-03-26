<h4>{{$character['name']}} (@lang('character.type.' . $character['type']))</h4>
<div class="row">
    <div class="col-xs-12 col-md-9">
        @foreach($character['partitions'] as $slug => $partition)
            <ul class="list-inline">
                <li>{{$partition['name']}}:</li>
                @foreach($partition['communities'] as $community)
                    <li>{{$community['name']}}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
    <div class="col-xs-12 col-md-3"><img src="http://placehold.it/200x300" alt="" class="img-responsive"/></div>
</div>