@extends('app')

@section('title') @lang('world.create.title') @endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('world.create.title')}}</div>
                    <div class="panel-body">
                        @include('common.feedback')

                        <form class="form-horizontal" role="form" method="POST" action="{{route('world.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">@lang('world.name.title')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">@lang('world.brand.title')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="brand" value="{{ old('brand') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">@lang('world.slug.title')</label>
                                <div class="col-md-6 input-group">
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                    <div class="input-group-addon">.{{env('APP_DOMAIN')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">@lang('member.admin.title')</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="admin" value="{{ old('admin') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('world.create.submit')}}
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