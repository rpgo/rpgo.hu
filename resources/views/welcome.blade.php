@extends('app')

@section('content')
    <div class="container-fluid">
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>RPGO.hu <span class="hidden-xs small">- A szerepjátékok otthona!</span> </h1>
            <p>Ahol az online szerepjáték könnyed élmény! Garanciát biztosítunk a minőségre az frpg játékosok, mesélők és világalkotók számára egyaránt.</p>
            <p><a href="{{route('user.create')}}" class="btn btn-primary btn-large">Hiszem, ha látom!</a></p>
        </header>

        <div class="row">
            <div class="col-sm-4">
                <h2>Játékosoknak</h2>
                <p>Férj hozzá egyetlen regisztrációval és bejelentkezéssel az összes világon meglevő összes karakteredhez, kalandodhoz, üzenetedhez, valamint minden más téged érintő hírhez.</p>
                <p><a href="{{route('user.create')}}" class="btn btn-default btn-large">Mindig ilyen játékra vágytam!</a></p>
            </div>
            <div class="col-sm-4">
                <h2>Mesélőknek</h2>
                <p>Tedd visszakereshetővé a kalandjaidat! Emeld az NJK-id hatását önálló profillal! Kezeld a poszt-sorrendet, az inaktivitást, a felszereléseket könnyedén.</p>
                <p><a href="{{route('user.create')}}" class="btn btn-default btn-large">Végre megvalósíthatom a kalandom!</a></p>
            </div>
            <div class="col-sm-4">
                <h2>Világalkotóknak</h2>
                <p>Készíts valódi világot sima fórum helyett! Gyakorolj könnyedén teljes befolyást egyszerű beállításokkal a világod működésére, kinézetére és tartalmára.</p>
                <p><a href="{{route('user.create')}}" class="btn btn-default btn-large">A világomnak itt a helye!</a></p>
            </div>
        </div>
    </div>
@endsection
