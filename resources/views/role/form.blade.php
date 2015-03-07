<div class="form-group">
    <label class="col-xs-3">@lang('role.form.name_solo'): </label>
    <div class="col-xs-6">
        <input type="text" class="form-control" name="name_solo" value="{{ $role['name_solo'] ?: old('name_solo') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.name_group'): </label>
    <div class="col-xs-6">
        <input type="text" class="form-control" name="name_group" value="{{ $role['name_group'] ?: old('name_group') }}">
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.description'): </label>
    <div class="col-xs-6">
        <textarea class="form-control" name="description" cols="30" rows="5" maxlength="255">{{ $role['description'] ?: old('description') }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="type" class="col-xs-3">@lang('role.form.type'): </label>
    <div class="col-xs-6">
        <select name="type" id="type" @if($role['exists']) disabled @endif>
            @foreach($types as $type)
                <option value="{{$type['id']}}" @if($type->equals($role['type'])) selected @endif>{{$type['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.members'): </label>
    <div class="col-xs-6">
        <div class="radio">
            <label><input type="radio" name="members" class="radio-inline" value="1" @if($role['exists'] && !$role['type']['automates_members']) disabled @endif> @lang('role.form.automatic')</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="members" class="radio-inline" value="0"> @lang('role.form.manual')</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="members" class="radio-inline" value="-1" @if($role['exists'] && $role['type']['no_member']) disabled @endif> @lang('role.form.joining')</label>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.secret'): </label>
    <div class="col-xs-6">
        <input type="checkbox" class="form-control" name="secret_role" value="yes" @if($role['secret_role'] ?: old('secret_role')) checked @endif>
    </div>
</div>