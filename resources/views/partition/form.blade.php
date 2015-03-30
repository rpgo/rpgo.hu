@include('common.feedback')
<div class="form-group">
    <label class="col-xs-6">@lang('partition.form.name'): </label>
    <div class="col-xs-6">
        <input type="text" class="form-control" name="name" value="{{ old('name') ?: $partition['name'] }}">
    </div>
</div>
<div class="form-group">
    <label class="col-xs-6">@lang('partition.form.limit'): </label>
    <div class="col-xs-6">
        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" onclick="document.getElementById('limit[{{$partition['id']}}]').setAttribute('value', parseInt(document.getElementById('limit[{{$partition['id']}}]').getAttribute('value'), 10) + -1)">
                  <span class="fa fa-minus"></span>
              </button>
          </span>
            <input type="text" id="limit[{{$partition['id']}}]" name="limit" class="form-control input-number" value="{{ old('limit') ?: $partition['limit'] }}" min="0">
          <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" onclick="document.getElementById('limit[{{$partition['id']}}]').setAttribute('value', parseInt(document.getElementById('limit[{{$partition['id']}}]').getAttribute('value'), 10) + 1)">
                  <span class="fa fa-plus"></span>
              </button>
          </span>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="type" class="col-xs-6">@lang('partition.form.previous'): </label>
    <div class="col-xs-6">
        <select name="rank" id="rank">
            <option value="first" @if($partition['rank'] == 0) selected @endif>@lang('partition.form.first')</option>
            @foreach($world['partitions'] as $index => $previous)
                @if($previous['id'] != $partition['id'])
                    <option value="{{$previous['id']}}" @if($partition['rank'] == $index + 1) selected @endif>{{$previous['name']}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-6">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="mandatory" @if($partition['mandatory']) checked @endif> @lang('partition.form.mandatory')
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-6">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="modifiable" @if($partition['modifiable']) checked @endif> @lang('partition.form.modifiable')
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-6">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="show_at_post" @if($partition['show_at_post']) checked @endif> @lang('partition.form.show_at_post')
            </label>
        </div>
    </div>
</div>