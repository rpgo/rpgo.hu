 @extends('dashboard.layout')

@section('subtitle') @lang('role.dashboard.title') @endsection

@section('subcontent')
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.dashboard.heading')</div>
        <div class="panel-body">
            <form role="form" method="POST">
                <table class="table table-striped table-bordered">
                    <style>
                        .over {
                            border-bottom: 2px dashed #000;
                        }
                    </style>
                    <tr>
                        <th>Rang</th>
                        <th class="text-center"><button type="submit" class="btn btn-xs btn-default" formaction="{{route('role.rank', [$world])}}">@lang('role.manage.rank')</button></th>
                        <th>@lang('role.info.name_solo')</th>
                        <th class="hidden-xs">@lang('role.info.name_group')</th>
                        <th class="hidden-xs">@lang('role.info.type')</th>
                        <th class="hidden-xs">@lang('role.info.secret')</th>
                        <th class="hidden-xs">@lang('member.info.count')</th>
                        <th class="hidden-xs">@lang('role.info.description')</th>
                        <th><input type="checkbox" name="selected[]" onchange="checkboxes = document.getElementsByClassName('role-select'); for(var index = 0; index < checkboxes.length; index++){checkboxes[index].checked = ! checkboxes[index].disabled && this.checked;}"/></th>
                    </tr>
                    @foreach($roles as $role)
                        <tr ondragover="event.preventDefault();"  draggable="true" ondragstart="this.style.opacity = '0.4';dragSource = this;event.dataTransfer.setData('source', this.outerHTML)" ondragenter="this.classList.add('over');" ondragleave="this.classList.remove('over');"  ondrop="event.stopPropagation(); if(dragSource != this){dragSource.parentNode.removeChild(dragSource) ; this.insertAdjacentHTML('afterend', event.dataTransfer.getData('source'));var ranks = this.parentNode.querySelectorAll('input.role-rank'); [].forEach.call(ranks, function(rank, index){rank.value = index + 1;});}var rows = this.parentNode.getElementsByTagName('tr'); [].forEach.call(rows, function(row){row.classList.remove('over'); row.style.opacity='1.0';});">
                            <td>{{$role['rank']}} <input type="hidden" class="role-rank" name="ranks[{{$role['id']}}]" value="{{$role['rank']}}"/></td>
                            <td style="cursor: move;" class="text-center"><i class="fa fa-arrows"></i></td>
                            <td><a href="{{route('role.edit', [$world, $role])}}">{{$role['name_solo']}}</a></td>
                            <td class="hidden-xs">{{$role['name_group']}}</td>
                            <td class="hidden-xs">{{$role['type']['name']}}</td>
                            <td class="hidden-xs">{{$role['secret_role'] ? trans('common.yes') : trans('common.no') }}</td>
                            <td class="hidden-xs">@if($role['type']['no_members']) <i class="fa fa-question"></i> @else {{$role['member_count']}} @endif</td>
                            <td class="hidden-xs">{{$role['description']}}</td>
                            <td><input class="role-select" type="checkbox" value="{{$role['id']}}" name="selected[]"/></td>
                        </tr>
                    @endforeach
                </table>
                <div>
                    @lang('role.form.selected'):
                    <button type="submit" class="btn btn-default" formaction="{{route('role.hide', [$world])}}">@lang('role.manage.hide')</button>
                    <button type="submit" class="btn btn-default" formaction="{{route('role.unhide', [$world])}}">@lang('role.manage.unhide')</button>
                    <button type="submit" class="btn btn-warning" formaction="{{route('role.desert', [$world])}}">@lang('role.form.empty')</button>
                    <button type="submit" class="btn btn-danger" formaction="{{route('role.delete', [$world])}}">@lang('role.form.delete')</button>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">@lang('role.create.heading')</div>
        <div class="panel-body">
            <form method="GET" action="{{route('role.create', [$world])}}" class="form-inline">
                <div class="form-group">
                    <label for="new_role_template">@lang('role.create.template'): </label>
                    <select name="@lang('role.template.variable')" id="new_role_template">
                        <option value="rpgo.@lang('role.template.none')" selected>@lang('role.create.custom')</option>
                        <option disabled>@lang('role.create.rpgo'):</option>
                        @foreach($templates as $template)
                            <option value="{{'rpgo.' . $template['slug']}}">{{$template['name_solo']}}</option>
                        @endforeach
                        <option disabled>@lang('role.create.world'):</option>
                        @foreach($roles as $template)
                            <option value="{{$template['world']['slug'] . '.' .$template['slug']}}">{{$template['name_solo']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary">
                            {{trans('role.create.submit')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection