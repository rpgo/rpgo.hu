<input type="hidden" name="_token" value="{{ csrf_token() }}">

@include('common.feedback')

<div class="form-group">
    <label class="col-xs-3" for="language">@lang('settings.form.language'): </label>
    <div class="col-xs-6">
        <select name="language" id="language" class="form-control">
            @foreach(['hu', 'en'] as $language)
                <option value="{{$language}}" @if((old('language') ?: $settings['language']) == $language) selected @endif>@lang('common.languages.' . $language)</option>
            @endforeach
        </select>
    </div>
</div>