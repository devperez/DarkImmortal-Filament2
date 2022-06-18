@extends('layouts.menu')
@section('content')
<link href="{{ asset('css/mobile_menu.css') }}" rel="stylesheet">

<div class="container-fluid" style="margin-bottom:15px">
    <div class="row grid gap-4"  style="margin-bottom:15px; justify-content:center;">
    @foreach($posts as $post)
        <div class="col-sm-10 col-xs-12 col-md-4 col-lg-3 mb-3">
            <div class="card h-100">
                <div class="card-image">
                    <a href="{{ route('groupe', $post->id) }}"><img src="{{ asset('storage/'.$post->image) }}" class="card-image" /></a>
                </div>
                <div class="card-text">
                    <span class="date">publié le {{ $post->created_at->format('d/m/Y à H:i:s') }}</span>
                    <h2>{{ $post->groupe }}</h2>
                    @if($post->morceau)
                        <p>{{ $post->morceau }}</p>
                    @else
                    <p>{{ $post->album }}</p>
                    @endif
                    <p>{!! $post->very_short_description !!}</p>
                </div>
                <div class="card-stats">
                    <div class="stat">
                        <div>Publié dans</div>
                        <p>{{ $post->genre }}</p>
                    </div>
                    <div class="stat border">
                        <div class="value">{{ $post->vues }}</div>
                        <div class="type">vues</div>
                    </div>
                    <div class="stat">
                        <div class="value">{{ count($post->comments) }}</div>
                        @if (count($post->comments)<= 1)
                            <div class="type">commentaire</div>
                            @else
                            <div class="type">commentaires</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="display:flex; justify-content:center; margin-top:50px;">
        {{ $posts->links() }}
    </div>
<div>


@endsection


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
