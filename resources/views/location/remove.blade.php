@extends('app')

@section('title') {{$location->name}} - @lang('location.remove.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('location.remove.heading'): {{$location->name}}</div>
                    <div class="panel-body">
                        @include('common.feedback')

                        <form class="form-inline" role="form" method="POST" action="{{route('location.delete', [$world, $location])}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">

                            <div class="form-group">
                                <label class="control-label">@lang('location.remove.sure')</label>
                                <button type="submit" class="btn btn-primary">
                                    @lang('location.remove.submit')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection