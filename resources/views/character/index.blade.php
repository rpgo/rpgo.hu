@extends('app')

@section('title') Character Index @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($world['characters'] as $character)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    @include('character.item', ['item' => $character])
                </div>
            @endforeach
        </div>
    </div>
@endsection