@extends('app')

@section('title') {{$location->name}} - @lang('location.edit.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('location.edit.heading'): {{$location->name}}</div>
                    <div class="panel-body">
                        @include('common.feedback')

                        <form class="form-horizontal" role="form" method="POST" action="{{route('location.rename.action', [$world, $location])}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label class="col-md-4 control-label">@lang('location.form.name')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ?: $location->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('location.edit.submit')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection