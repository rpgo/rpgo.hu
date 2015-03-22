@extends('dashboard.layout')

@section('subtitle') @lang('settings.edit.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('settings.edit.header')</div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{route('settings.update', [$world])}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-xs-3" for="language">@lang('settings.form.language'): </label>
                    <div class="col-xs-6">
                        <select name="language" id="language" class="form-control">
                            @foreach(['hu', 'en'] as $language)
                                <option value="{{$language}}" @if($settings['language'] == $language) selected @endif>@lang('common.languages.' . $language)</option>
                            @endforeach
                        </select>
                    </div>
                </div>

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