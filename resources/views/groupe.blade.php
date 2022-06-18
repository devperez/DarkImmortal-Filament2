@extends('layouts.menu')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">
<link href="{{ asset('css/Hover-master/css/hover.css') }}" rel="stylesheet">
@livewireStyles

<div class="couv" style="background-image: url('{{ asset('storage/'. $post->couv) }}')"></div>
<div class=container-fluid>
    <div class="row">
        <div class="col" style="margin-top:15px">
            <a href="{{ route('liste', $post->groupe) }}"><h1 class="hvr-underline-from-center">{{ $post->groupe }}</h1></a>
            <div style="display:flex; justify-content:center;">
                <h2>{{ $post->album }}</h2>
                @isset($post->morceau)
                    <h2>-//-</h2>
                    <h2>{{ $post->morceau }}</h2>
                @endisset
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-12" style="margin-bottom: 15px;">
            <img src=" {{ asset('storage/'.$post->image) }}" style="float:left; padding:10px; width:100%" />
        </div>
        <div class="col-lg-4 col-md-12" style="margin-bottom: 15px;">
            <p class="article">{!! $post->article !!}</p>
        </div>
    </div>
    <hr style="color:#ff076e">
    <div class="row">
        @isset($paroles)
        <div class="col-lg-6 col-md-4 col-sm-12" style="margin-bottom: 15px;">
            <p>Paroles :</p>
            <p>{!! $paroles !!}</p>
        </div>
        @endisset
        @isset($clip)
        <div class="col-lg-6 col-md-8 col-sm-12" style="margin:auto;">
            <div>
                {!! $clip !!}
            </div>
        </div>
        @endisset
    </div>
</div>





<livewire:comments :post="$post" />


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


    
    <div class="container-fluid" style="margin-bottom:150px;">
        <hr>
        <h3>Vous aimerez peut-être aussi :</h3>
        <div class="row grid gap-5"  style="margin-bottom:15px; display:flex; justify-content:center;">
        @foreach($alikes as $alike)
            <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-image">
                        <a href="{{ route('groupe', $alike->id) }}"><img src="{{ asset('storage/'.$alike->image) }}" class="card-image" /></a>
                    </div>
                    <div class="card-text">
                        <span class="date">publié le {{ $alike->created_at->format('d/m/Y à H:i:s') }}</span>
                        <h2>{{ $alike->groupe }}</h2>
                        @if($alike->morceau)
                        <p>{{ $alike->morceau }}</p>
                        @else
                        <p>{{ $alike->album }}</p>
                        @endif
                        <p>{!! $alike->very_short_description !!}</p>
                    </div>
                    <div class="card-stats">
                        <div class="stat">
                            <p>Publié dans {{ $post->genre }}</p>
                        </div>
                        <div class="stat border">
                            <div class="value">{{ $alike->vues }}</div>
                            <div class="type">vues</div>
                        </div>
                        <div class="stat">
                            <div class="value">{{ count($alike->comments) }}</div>
                            @if (count($alike->comments)<= 1)
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
    </div>
</div>
{{-- <script id="dsq-count-scr" src="//darkimmortal.disqus.com/count.js" async></script>

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url =' {{ Request::url() }} ';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://darkimmortal.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();

</script> --}}







@livewireScripts
@endsection

