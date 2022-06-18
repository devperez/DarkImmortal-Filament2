<div class='container-fluid' style="margin-bottom:150px">
    <div class="row grid gap-4">
    
    @if (count($posts)>=1)
<div class="container-fluid">
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
                    <p>Publié dans {{ $post->genre }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
