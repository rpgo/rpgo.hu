@extends('app')

@section('title') @lang('character.create.' . session('character.create.step') . '.title') - @lang('character.create.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('character.create.' . session('character.create.step') . '.title') - @lang('character.create.header')</div>
                    <div class="panel-body">
                        @include('common.feedback')

                        <div class="alert alert-info" role="alert">
                            <p>@lang('character.create.' . session('character.create.step') . '.info')</p>
                        </div>

                        <form class="form-horizontal" role="form" method="POST" action="{{route('character.store', $world)}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('character.create.' . session('character.create.step'))

                            {{--

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('character.create.name')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('character.create.submit')}}
                                    </button>
                                </div>
                            </div>--}}
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="">@lang('common.back')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('character.create.preview.title')}}</div>
                    <div class="panel-body">
                        @include('character.create.preview', ['character' => session('character.create.data')])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection