<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class NavController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function groupes()
    {
        $posts = Post::latest()->paginate(6);

        //Call to Lastfm API
        $response = Http::get("https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=Empyrium666&api_key=47c0277d61bf5ad17c56fc542f0e0762&format=json&limit=10")->json($key=null);
        
        $response = $response["recenttracks"]["track"];
        //dd($response);
        //$bands = Post::all();
        //$comments = Comment::all();
        $comments = DB::table('posts')
                    ->join('comments', 'comments.post_id', '=', 'posts.id')
                    ->get();
        $commentNumber = count($comments);
        //dd(count($comments));
                    
        
        
        
        return view('index', compact('posts', 'commentNumber', 'response'))->with(request()->input('page'));
        
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $post->id)->get();
        $clip = $post->clip;
        $genre = $post->genre;
        $paroles = $post->paroles;
        $id = $post->id;
        $vues = $post->vues;
        $post->timestamps = false;
        $post->increment('vues');
        //dd($post->vues);
        $bandalikes = Post::where('genre', "=", $genre)->take(3)->get();
        $alikes = $bandalikes->reject($post); //pour éviter de proposer le post en cours de lecture dans la rubrique "vous aimerez peut-être aussi"
        $comments = json_decode($comments, true);
        // dd($comments);
        return view('groupe', compact('post', 'comments', 'clip', 'id', 'paroles', 'alikes', 'vues'));
    }

    public function liste($groupe)
    {
        //dd($groupe);
        $posts = Post::where('groupe','=', $groupe)->get();
        // dd($liste);
        
        return view('liste', compact('groupe','posts'));
    }

    public function index()
    {
        return view('search');
    }

    public function search( Request $request)
    {
        $band = $request->band;
        //dd($band);
        $posts = Post::where('groupe', 'like',"%{$band}%")->limit(10)->get();
        // dd($posts);
        return view("searchpartial", compact('posts'));
    }

    public function random()
    {
        $post = Post::all()->random(1)->first();
        $genre = $post->genre;
        $bandalikes = Post::where('genre', "=", $genre)->take(3)->get();
        $alikes = $bandalikes->reject($post); //pour éviter de proposer le post en cours de lecture dans la rubrique "vous aimerez peut-être aussi"
        // dd($alikes);
        // dd($post);
        return view('random', compact('post','alikes'));
    }

    public function black()
    {
        $posts = Post::where('genre','like','Black Metal')->simplePaginate(6);

        return view('black', compact('posts'));
    }

    public function death()
    {
        $posts = Post::where('genre','like','Death Metal')->simplePaginate(6);

        return view('death', compact('posts'));
    }

    public function doom()
    {
        $posts = Post::where('genre','=','Doom Metal')->simplepaginate(6);
        return view('doom', compact('posts'));
    }

    public function autre()
    {
        $posts = Post::where('genre','=','Autre')->simplepaginate(6);
        return view('autre', compact('posts'));
    }
}       