@extends('layouts.menu')
@section('content')
<link href="{{ asset('css/mobile_menu.css') }}" rel="stylesheet">

<div class="container-fluid" style="margin-bottom:15px">
    <div class="row grid gap-4"  style="margin-bottom:15px; justify-content:center;">
    @foreach($playlists as $playlist)
        <div class="col-sm-10 col-xs-12 col-md-4 col-lg-3 mb-3">
            <div class="card h-100">
                <div class="card-image">
                    <a href="{{ route('playlist', $playlist->id) }}"><img src="{{ asset('storage/'.$playlist->carte) }}" class="card-image" /></a>
                </div>
                <div class="card-text">
                    <span class="date">publié le {{ $playlist->created_at->format('d/m/Y à H:i:s') }}</span>
                    <h2>{{ $playlist->groupe }}</h2>
                    <p>{{ $playlist->theme }}</p>
                </div>
                <div class="card-stats">
                    <div class="stat">
                        <div>Publié dans</div>
                        <p>Playlists</p>
                    </div>
                    <div class="stat border">
                        <div class="value">{{ $playlist->vues }}</div>
                        <div class="type">vues</div>
                    </div>
                    <div class="stat">
                        <div class="value">{{ count($playlist->comments) }}</div>
                        @if (count($playlist->comments)<= 1)
                            <div class="type">commentaire</div>
                            @else
                            <div class="type">commentaires</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div style="display:flex; justify-content:center; margin-top:50px;">
        {{ $playlists->links() }}
    </div>
</div>
@endsection