<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('rpgo.home')}}">RPGO</a>
            @if($world)
                <a class="navbar-brand" href="{{route('world.main', $world)}}">{{ $world->brand }}</a>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(! $world)
                    @include('common.nav.rpgo')
                @else
                    @include('common.nav.world')
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (! $user )
                    @include('common.nav.guest')
                @elseif (! $member)
                    @include('common.nav.user')
                @else
                    @include('common.nav.member')
                @endif
            </ul>
        </div>
    </div>
</nav>