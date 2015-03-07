@include('common.feedback')
<div class="form-group">
    <label class="col-xs-3">@lang('role.form.name_solo'): </label>
    <div class="col-xs-6">
        <input type="text" class="form-control" name="name_solo" value="{{ old('name_solo') ?: $role['name_solo'] }}">
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.name_group'): </label>
    <div class="col-xs-6">
        <input type="text" class="form-control" name="name_group" value="{{ old('name_group') ?: $role['name_group'] }}">
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.description'): </label>
    <div class="col-xs-6">
        <textarea class="form-control" name="description" cols="30" rows="5" maxlength="255">{{ old('description') ?: $role['description'] }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="type" class="col-xs-3">@lang('role.form.type'): </label>
    <div class="col-xs-6">
        <select name="type_id" id="type" @if($role['exists']) disabled @endif>
            @foreach($types as $type)
                <option value="{{$type['id']}}" @if($type['id'] == (old('type_id') ?: $role['type']['id'])) selected @endif>{{$type['name']}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.members'): </label>
    <div class="col-xs-6">
        <div class="radio">
            <label><input type="radio" name="members" class="radio-inline" value="0" @if((old('members') ?: $role['automates_members']) == 0) checked @endif> @lang('role.form.manual')</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="members" class="radio-inline" value="1" @if($role['exists'] && !$role['type']['automates_members']) disabled @endif @if((old('members') ?: $role['automates_members']) == 1) checked @endif> @lang('role.form.automatic')</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="members" class="radio-inline" value="-1" @if($role['exists'] && $role['type']['no_member']) disabled @endif @if(old('members') == -1) checked @endif> @lang('role.form.joining')</label>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-xs-3">@lang('role.form.secret'): </label>
    <div class="col-xs-6">
        <div class="checkbox">
            <label><input type="checkbox" class="checkbox-inline" name="secret_role" value="yes" @if( old('secret_role') ?: $role['secret_role']) checked @endif> @lang('role.form.hide')</label>
        </div>
    </div>
</div>

<table class="table table-striped table-bordered">
    <tr>
        <th>@lang('permission.form.name')</th>
        <th>@lang('permission.form.description')</th>
        <th>@lang('permission.form.granted')</th>
        <th>@lang('permission.form.denied')</th>
        <th>@lang('permission.form.vetoed')</th>
    </tr>
    @foreach($role['permissions'] as $permission)
        <tr>
            <td>{{$permission['name']}}</td>
            <td>{{$permission['description']}}</td>
            <td><input type="radio" name="grants[{{$permission['id']}}]" value="1" @if($permission->pivot['grant'] == 1) checked @endif /></td>
            <td><input type="radio" name="grants[{{$permission['id']}}]" value="0" @if($permission->pivot['grant'] == 0) checked @endif /></td>
            <td><input type="radio" name="grants[{{$permission['id']}}]" value="-1" @if($permission->pivot['grant'] == -1) checked @endif /></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2">@lang('common.info.total')</td>
        <td><input type="radio" value="1"/></td>
        <td><input type="radio" value="0"/></td>
        <td><input type="radio" value="-1"/></td>
    </tr>
</table>