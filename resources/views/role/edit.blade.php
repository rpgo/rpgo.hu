@extends('dashboard.layout')

@section('subtitle') @lang('role.edit.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.edit.heading')</div>
        <div class="panel-body">
            <form method="POST" action="{{route('role.update', [$world])}}" class="form-horizontal">
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
                        <input type="checkbox" class="form-control" name="secret" value="{{ $role['secret'] ?:old('secret') }}">
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
        <div class="panel-heading">@lang('role.members.heading')</div>
        <div class="panel-body">
            <form method="POST" action="{{route('role.update', [$world, $role])}}" class="form-horizontal col-xs-6">
                <ul class="list-inline list-group">
                    @forelse($role['members'] as $member)
                        <li class="list-group-item">{{$member['name']}} <input type="checkbox" value="{{$member['id']}}" name="members[]" class="member-select"/></li>
                    @empty
                        <div>@lang('members.count.empty')</div>
                    @endforelse
                </ul>
            </form>
            @if($role['custom'])
                <form method="POST" action="{{route('role.update', [$world, $role])}}" class="form-inline">
                    <div class="form-group">
                        <label>@lang('role.members.add'): </label>
                        <input type="text" list="members-list" class="form-control" name="secret" value="{{ old('secret') }}">
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