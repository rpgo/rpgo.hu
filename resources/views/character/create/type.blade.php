<div class="alert alert-info" role="alert">
    <p>@lang('character.create.type.info')</p>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div>
            <button type="submit" class="btn btn-primary" name="type" value="player">
                {{trans('character.create.type.master')}}
            </button>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div>
            <button type="submit" class="btn btn-primary" name="type" value="master">
                {{trans('character.create.type.player')}}
            </button>
        </div>
    </div>
</div>