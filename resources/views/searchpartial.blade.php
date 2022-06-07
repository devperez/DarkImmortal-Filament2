<div class='container-fluid' style="margin-bottom:150px">
    <div class="row grid gap-4">
    
    @if (count($posts)>=1)

    @foreach($posts as $post)
    <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
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
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
