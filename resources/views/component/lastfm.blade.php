@section('lastfm')
<nav class="navbar navbar-light bg-grey">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{ asset('/img/social_lastfm_29.png') }}" style="width:64px;" />
        </button>
    </div>
</nav>
<div class="collapse navbar-collapse" id="navbarNav">
    @isset($response)
        <div class="container-fluid desktopmenu">
            <p>Mes 10 derniers scrobbles sur Lastfm :</p>
            <div class="lastfm_container">
            @foreach ($response as $item)
                <li>{{ $item["artist"]["#text"] }} : {{ $item["album"]["#text"] }} | {{ $item["name"] }}</li>
            @endforeach
            </div>    
        </div>
    @endisset
</div>
@endsection