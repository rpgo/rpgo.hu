@extends('app')

@section('content')
    <div class="container-fluid">
        @if(can('see.planned.games') && $planned_games)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tervezett játékok
                </div>
                <div class="panel-body">
                    @include('game.categories', ['categories' => $planned_games])
                </div>
            </div>
        @endif

        @if(can('see.announced.games') && $announced_games)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Meghirdetett játékok
                </div>
                <div class="panel-body">
                    @include('game.categories', ['categories' => $announced_games])
                </div>
            </div>
        @endif

        @if(can('see.started.games') && $started_games)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Elkezdett játékok
                </div>
                <div class="panel-body">
                    @include('game.categories', ['categories' => $started_games])
                </div>
            </div>
        @endif

        @if(can('see.finished.games') && $finished_games)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Befejezett játékok
                </div>
                <div class="panel-body">
                    @include('game.categories', ['categories' => $finished_games])
                </div>
            </div>
        @endif
    </div>
@endsection