@foreach($world['partitions'] as $partition)
    <div class="form-group">
        <label for="{{$partition['slug']}}" class="col-md-4 control-label">{{$partition['name']}}:</label>
        <div class="col-md-6">
            <select id="{{$partition['slug']}}" name="{{$partition['slug']}}[]" class="form-control"
            @if($partition['limit'] != 1) multiple @endif>
                @foreach($partition['communities'] as $community)
                    <option value="{{$community['id']}}">{{$community['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endforeach

@include('character.create.next')