<ul>
    @foreach($categories as $category)
        <li><p>{{$category['title']}}</p>
            <ul>
                @foreach($category['games'] as $game)
                    <li>{{$game['title']}}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>