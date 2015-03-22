@extends('dashboard.layout')

@section('subtitle') @lang('settings.edit.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('settings.edit.header')</div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('settings.update', [$world])}}">

                @include('settings.form')

                <div class="form-group">
                    <div class="col-xs-4 col-xs-offset-3">
                        <button type="submit" class="btn btn-primary">
                            {{trans('settings.edit.submit')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection