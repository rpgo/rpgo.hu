@extends('app')

@section('content')
    <div class="container-fluid">
        @if(can('see.planned.games') && $planned_games)
            <h2>Készülő játékok</h2>
            <hr/>
            @include('game.categories', ['categories' => $planned_games])
        @endif

        @if(can('see.announced.games') && $announced_games)
            <h2>Meghirdetett játékok</h2>
            <hr/>
            @include('game.categories', ['categories' => $announced_games])
        @endif

        @if(can('see.started.games') && $started_games)
            <h2>Futó játékok</h2>
            <hr/>
            @include('game.categories', ['categories' => $started_games])
        @endif

        @if(can('see.finished.games') && $finished_games)
            <h2>Befejezett játékok</h2>
            <hr/>
            @include('game.categories', ['categories' => $finished_games])
        @endif
    </div>
@endsection