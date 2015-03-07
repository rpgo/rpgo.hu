@extends('dashboard.layout')

@section('subtitle') @lang('role.create.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.create.header')</div>
        <div class="panel-body">
            <form method="POST" action="{{route('role.store', [$world])}}" class="form-horizontal">
                @include('role.form')
                <div class="form-group">
                    <div class="col-xs-4 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary">
                            {{trans('role.create.submit')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection