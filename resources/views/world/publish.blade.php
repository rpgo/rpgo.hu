<form class="form-inline" role="form" method="POST" action="{{route('world.publish', $world)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <span class="control-label">@lang('world.publish.question')</span>
        <button type="submit" class="btn btn-primary">@lang('world.publish.submit')</button>
    </div>
</form>