@extends('dashboard.layout')

@section('subtitle') {{$role['name_solo']}} - @lang('role.edit.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.edit.heading'): {{$role['name_solo']}}</div>
        <div class="panel-body">
            <form method="POST" action="{{route('role.update', [$world, $role])}}" class="form-horizontal">

                @include('role.form')

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
@endsection