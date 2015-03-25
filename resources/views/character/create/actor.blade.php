<div class="form-group">
    <label class="col-md-4 control-label">{{trans('character.form.actor')}}:</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="actor" value="{{ old('actor') }}">
    </div>
</div>

@include('character.create.next')