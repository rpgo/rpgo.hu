@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('world.create.title')}}</div>
                    <div class="panel-body">
                        @include('common.feedback')

                        <form class="form-horizontal" role="form" method="POST" action="/auth/register">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('world.name.title')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('world.brand.title')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="brand" value="{{ old('brand') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('world.slug.title')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
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