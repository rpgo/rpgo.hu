@extends('app')

@section('content')
    <div class="container-fluid">
        <ul>
            @foreach($choices as $choice)
                <li><p>{{$choice['title']}}</p>
                    <ul>
                        @foreach($choice['games'] as $game)
                            <li>{{$game['title']}}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection