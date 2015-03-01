@extends('dashboard.layout')

@section('subtitle') @lang('role.dashboard.title') @endsection

@section('subcontent')
    <table class="table table-striped table-bordered">
        <tr>
            <th>@lang('role.name.info')</th>
            <th>@lang('role.description.info')</th>
            <th>@lang('common.select.info')</th>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td><a href="{{route('role.edit', [$world, $role])}}">{{$role['name_solo']}}</a></td>
                <td>{{$role['description']}}</td>
                <td></td>
            </tr>
        @endforeach

    </table>
@endsection