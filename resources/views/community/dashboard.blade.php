@extends('dashboard.layout')

@section('subtitle') @lang('community.dashboard.title') @endsection

@section('subcontent')
    @foreach($world['partitions'] as $partition)
        <div class="panel panel-default">
            <div class="panel-heading">{{$partition['name']}}</div>
            <div class="panel-body">
                <div class="col-xs-12 col-md-6">

                    <form role="form" method="POST" action="{{route('community.dashboard')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('partition.form')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-6">
                                <button type="submit" class="btn btn-primary"">
                                @lang('partition.dashboard.save')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-6">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>@lang('community.dashboard.table')</th>
                            <th><input type="checkbox" name="selected[]" onchange="checkboxes = document.getElementsByClassName('role-select'); for(var index = 0; index < checkboxes.length; index++){checkboxes[index].checked = ! checkboxes[index].disabled && this.checked;}"/></th>
                        </tr>
                        @foreach($partition['communities'] as $community)
                            <tr ondragover="event.preventDefault();"  draggable="true" ondragstart="this.style.opacity = '0.4';dragSource = this;event.dataTransfer.setData('source', this.outerHTML)" ondragenter="this.classList.add('over');" ondragleave="this.classList.remove('over');"  ondrop="event.stopPropagation(); if(dragSource != this){dragSource.parentNode.removeChild(dragSource) ; this.insertAdjacentHTML('afterend', event.dataTransfer.getData('source'));var ranks = this.parentNode.querySelectorAll('input.role-rank'); [].forEach.call(ranks, function(rank, index){rank.value = index + 1;});}var rows = this.parentNode.getElementsByTagName('tr'); [].forEach.call(rows, function(row){row.classList.remove('over'); row.style.opacity='1.0';});">
                                <td><a href="">{{$community['name']}}</a></td>
                                <td><input class="role-select" type="checkbox" value="{{$community['id']}}" name="selected[]"/></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><input type="text"/></td>
                            <td><button class="btn btn-primary">Új</button></td>
                        </tr>
                    </table>
                    <div>
                        @lang('community.dashboard.selected'):
                        <button type="submit" class="btn btn-danger" formaction="{{route('role.delete', [$world])}}">@lang('community.dashboard.delete')</button>
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