@extends('dashboard.layout')

@section('subtitle') @lang('role.edit.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.edit.heading')</div>
        <div class="panel-body">
            <form method="POST" action="{{route('role.update', [$world, $role])}}" class="form-horizontal">
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
                    <label class="col-xs-3">@lang('role.form.secret'): </label>
                    <div class="col-xs-6">
                        <input type="checkbox" class="form-control" name="secret" value="yes" @if($role['secret'] ?: old('secret')) checked @endif>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-4 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary">
                            {{trans('role.edit.submit')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.discharge.heading')</div>
        <div class="panel-body">
            @if(count($role['members']))
            <form method="POST" action="{{route('role.discharge', [$world, $role])}}" class="form-inline">
                <ul class="form-group list-inline list-group">
                    @foreach($role['members'] as $member)
                        <li class="list-group-item">{{$member['name']}} <input type="checkbox" value="{{$member['id']}}" name="members[]" class="member-select"/></li>
                    @endforeach
                </ul>
                <ul class="form-group">
                    <li class="list-group-item">@lang('role.discharge.total') <input type="checkbox"  onchange="checkboxes = document.getElementsByClassName('member-select'); for(var index = 0; index < checkboxes.length; index++){checkboxes[index].checked = ! checkboxes[index].disabled && this.checked;}" /></li>
                </ul>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{trans('role.discharge.submit')}}
                    </button>
                </div>
            </form>
            @else
                <div>@lang('members.count.empty')</div>
            @endif
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.assign.heading')</div>
        <div class="panel-body">
            @if($role['custom'])
                <form method="POST" action="{{route('role.assign', [$world, $role])}}" class="form-inline">
                    <div class="form-group">
                        <label>@lang('role.assign.member'): </label>
                        <input type="text" list="members-list" class="form-control" name="member" value="{{ old('member') }}">
                        <datalist id="members-list">
                            @foreach($world['members'] as $member)
                                <option>{{$member['name']}}</option>
                            @endforeach
                        </datalist>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{trans('role.members.submit')}}
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.permissions.heading')</div>
        <div class="panel-body">
            <form method="POST" action="{{route('role.update', [$world])}}" class="form-horizontal">
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
                            <td><input type="radio" name="{{$permission['id']}}" value="1" @if($permission->pivot['grant'] == 1) checked @endif /></td>
                            <td><input type="radio" name="{{$permission['id']}}" value="0" @if($permission->pivot['grant'] == 0) checked @endif /></td>
                            <td><input type="radio" name="{{$permission['id']}}" value="-1" @if($permission->pivot['grant'] == -1) checked @endif /></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">@lang('common.info.total')</td>
                        <td><input type="radio" value="1"/></td>
                        <td><input type="radio" value="0"/></td>
                        <td><input type="radio" value="-1"/></td>
                    </tr>
                </table>
                <div class="form-group">
                    <div class="col-xs-4 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary">
                            {{trans('role.permissions.submit')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection