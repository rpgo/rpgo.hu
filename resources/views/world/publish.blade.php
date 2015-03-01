@if( ! $world->published_at)
    <form class="form" role="form" method="POST" action="{{route('world.publish', $world)}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="control-label">@lang('world.publish.question')</label>
            <button type="submit" class="btn btn-primary">@lang('world.publish.submit')</button>
        </div>
    </form>
@endif