 @extends('dashboard.layout')

@section('subtitle') @lang('role.dashboard.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.dashboard.heading')</div>
        <div class="panel-body">
            <form role="form" method="POST">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>@lang('role.info.name')</th>
                        <th>@lang('member.info.count')</th>
                        <th>@lang('role.info.description')</th>
                        <th>@lang('common.info.select')</th>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td><a href="{{route('role.edit', [$world, $role])}}">{{$role['name_solo']}} ({{$role['name_group']}})</a></td>
                            <td>{{$role['member_count']}}</td>
                            <td>{{$role['description']}}</td>
                            <td><input class="role-select" type="checkbox" value="{{$role['id']}}" name="selected[]" @if( ! $role['custom']) disabled @endif /></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>@lang('common.info.total')</td>
                        <td>{{$world['member_count']}}</td>
                        <td></td>
                        <td><input type="checkbox" value="{{$role['id']}}" name="selected[]" onchange="checkboxes = document.getElementsByClassName('role-select'); for(var index = 0; index < checkboxes.length; index++){checkboxes[index].checked = ! checkboxes[index].disabled && this.checked;}"/>{{$role['custom']}}</td>
                    </tr>
                </table>
                <div>
                    @lang('role.form.selected'):
                    <button type="submit" class="btn btn-warning" formaction="{{route('role.desert', [$world])}}">@lang('role.form.empty')</button>
                    <button type="submit" class="btn btn-danger" formaction="{{route('role.delete', [$world])}}">@lang('role.form.delete')</button>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.create.heading')</div>
        <div class="panel-body">
            <form method="POST" action="{{route('role.store', [$world])}}" class="form-inline">
                <div class="form-group">
                    <label>@lang('role.form.name_solo'): </label>
                    <input type="text" class="form-control" name="name_solo" value="{{ old('name_solo') }}">
                </div>

                <div class="form-group">
                    <label>@lang('role.form.name_group'): </label>
                    <input type="text" class="form-control" name="name_group" value="{{ old('name_group') }}">
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary">
                            {{trans('role.create.submit')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection