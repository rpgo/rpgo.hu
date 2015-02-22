@extends('app')

@section('title') {{$location->name}} - @lang('location.move.title') @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('location.move.heading'): {{$location->name}}</div>
                    <div class="panel-body">
                        @include('common.feedback')

                        <form class="form-horizontal" role="form" method="POST" action="{{route('location.relocate', [$world, $location])}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="target" class="col-md-4 control-label">@lang('location.move.location')</label>
                                <div class="col-md-6">
                                    <select id="target" name="target_id" class="form-control">
                                        @foreach($world->rootlocation()->sublocations as $sublocation)
                                            <option value="{{$sublocation->id}}"
                                            @if($location->parent() && $sublocation->equals($location->parent())) selected="selected" @elseif($sublocation->equals($location)) disabled @endif>{{$sublocation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('location.move.submit')
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