@extends('dashboard.layout')

@section('subtitle') @lang('role.index.title') @endsection

@section('subcontent')
    <table class="table table-striped table-bordered">
        <tr>
            <th>@lang('role.name.info')</th>
            <th>Kijelölés</th>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td><a href="{{route('role.show', [$world, $role])}}">{{$role['name_solo']}}</a></td>
                <td></td>
            </tr>
        @endforeach

    </table>
@endsection