@extends('dashboard.layout')

@section('subtitle') @lang('community.dashboard.title') @endsection

@section('subcontent')
    @foreach($world['partitions'] as $partition)
        <div class="panel panel-default">
            <div class="panel-heading">{{$partition['name']}}</div>
            <div class="panel-body">
                <div class="col-xs-12 col-md-6"></div>
                <div class="col-xs-12 col-md-6">
                    <table class="table table-striped table-bordered">
                        <style>
                            .over {
                                border-bottom: 2px dashed #000;
                            }
                        </style>
                        <tr>
                            <th>Közösségek</th>
                            <th><input type="checkbox" name="selected[]" onchange="checkboxes = document.getElementsByClassName('role-select'); for(var index = 0; index < checkboxes.length; index++){checkboxes[index].checked = ! checkboxes[index].disabled && this.checked;}"/></th>
                        </tr>
                        @foreach($partition['communities'] as $community)
                            <tr ondragover="event.preventDefault();"  draggable="true" ondragstart="this.style.opacity = '0.4';dragSource = this;event.dataTransfer.setData('source', this.outerHTML)" ondragenter="this.classList.add('over');" ondragleave="this.classList.remove('over');"  ondrop="event.stopPropagation(); if(dragSource != this){dragSource.parentNode.removeChild(dragSource) ; this.insertAdjacentHTML('afterend', event.dataTransfer.getData('source'));var ranks = this.parentNode.querySelectorAll('input.role-rank'); [].forEach.call(ranks, function(rank, index){rank.value = index + 1;});}var rows = this.parentNode.getElementsByTagName('tr'); [].forEach.call(rows, function(row){row.classList.remove('over'); row.style.opacity='1.0';});">
                                <td><a href="">{{$community['name']}}</a></td>
                                <td><input class="role-select" type="checkbox" value="{{$community['id']}}" name="selected[]"/></td>
                            </tr>
                        @endforeach
                    </table>
                    <div>
                        @lang('community.form.selected'):
                        <button type="submit" class="btn btn-danger" formaction="{{route('role.delete', [$world])}}">@lang('role.form.delete')</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="panel panel-default">
        <div class="panel-heading">Új felosztás hozzáadása</div>
        <div class="panel-body">

        </div>
    </div>
@endsection