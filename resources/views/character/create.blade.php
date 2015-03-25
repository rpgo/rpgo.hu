@extends('app')

@section('title') Character Creation @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('character.create.' . session('character.create.step') . '.title') - @lang('character.create.header')</div>
                    <div class="panel-body">
                        @include('common.feedback')

                        <form class="form-horizontal" role="form" method="POST" action="{{route('character.store', $world)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('character.create.' . session('character.create.step'))

                            {{--

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('character.create.name')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            @foreach($partitions as $partition)
                                <div class="form-group">
                                    <label for="{{$partition['slug']}}" class="col-md-4 control-label">{{$partition['name']}}:</label>
                                    <div class="col-md-6">
                                        <select id="{{$partition['slug']}}" name="{{$partition['slug']}}[]" class="form-control"
                                            @if($partition['limit'] != 1) multiple @endif>
                                            @foreach($partition['communities'] as $community)
                                                <option value="{{$community['id']}}">{{$community['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach

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
                    <div class="panel-heading">{{trans('character.create.preview')}}</div>
                    <div class="panel-body">
                        @include('character.item', ['item' => new \Rpgo\Models\Character()])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection