@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">
<link href="{{ asset('css/Hover-master/css/hover.css') }}" rel="stylesheet">
@livewireStyles

<div class="couv" style="background-image: url('{{ asset('storage/'. $playlist->couverture) }}')"></div>
<div class=container-fluid>
    <div class="row">
        <div class="col" style="margin-top:15px">
            {{-- <a href="{{ route('liste', $post->groupe) }}"><h1 class="hvr-underline-from-center">{{ $post->groupe }}</h1></a> --}}
            <div style="display:flex; justify-content:center;">
                <h2>{{ $playlist->groupe }}</h2>
                <h2>-//-</h2>
                <h2>{{ $playlist->theme }}</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-12" style="margin-bottom: 15px;">
            <img src=" {{ asset('storage/'.$playlist->carte) }}" style="float:left; padding:10px; width:100%" />
        </div>
        <div class="col-lg-4 col-md-12" style="margin-bottom: 15px;">
            <p class="article">{!! $playlist->article !!}</p>
        </div>
    </div>
    <hr style="color:#ff076e">
    <div class="row" style="margin-top: 30px; margin-left:auto; margin-right:auto;">
        @isset($playlist->clip01)
        <div class="col-lg-6 col-md-4 col-sm-12" style="margin-bottom: 15px;">
            <div>{!! $playlist->clip01 !!}</div>
        </div>
        @endisset
        @isset($playlist->clip02)
        <div class="col-lg-6 col-md-8 col-sm-12" style="margin:auto;">
            <div>
                {!! $playlist->clip02 !!}
            </div>
        </div>
        @endisset
    </div>
</div>

<livewire:comments :playlist="$playlist" />

@foreach ($comments as $comment )
@if($comment['check'] == 1)
    <div class="rounded shadow m-3 p-2 w-1/2" style="border:solid 1px rgb(255,7,110); width:50%;">
        <div class="flex justify-self-center my-2">
            <p class="font-bold text-lg">{{ $comment['author'] }}</p>
            <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $comment['body'] }}</p>
        </div>
    </div>
    @endif
    
@endforeach

@livewireScripts

@endsection