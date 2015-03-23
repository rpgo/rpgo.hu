@extends('app')

@section('content')
    <div class="container-fluid">
        <h2>Készülőben levő játékok</h2>
        <hr/>
        
        <h2>Hamarosan induló játékok</h2>
        <hr/>
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
        <h2>Már futó játékok</h2>
        <hr/>
        <h2>Archívum</h2>
        <hr/>
        <ul>
            @foreach($chapters as $chapter)
                <li><p>{{$chapter['title']}}</p>
                    <ul>
                        @foreach($chapter['games'] as $game)
                            <li>{{$game['title']}}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection