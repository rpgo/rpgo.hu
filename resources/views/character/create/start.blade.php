<div class="alert alert-info" role="alert">
    <p>A karakteralkotás megkezdéséhez először ki kell választanod a karaktered típusát.</p>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div>
            <button type="submit" class="btn btn-primary" name="type" value="player">
                {{trans('character.create.master')}}
            </button>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div>
            <button type="submit" class="btn btn-primary" name="type" value="master">
                {{trans('character.create.player')}}
            </button>
        </div>
    </div>
</div>