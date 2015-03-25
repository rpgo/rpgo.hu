<div class="form-group">
    <label class="col-md-4 control-label">{{trans('character.form.name')}}:</label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
</div>

@include('character.create.next')