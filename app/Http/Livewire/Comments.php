<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use App\Models\Playlist;
use App\Events\CommentCreated;
use Illuminate\Support\Facades\Route;

class Comments extends Component
{

    public $author;
    public $body;
    public $post;
    public $comments;
    public $playlist;

    protected $rules = [
        'author' => 'required|max:20',
        'body' => 'required|string',
    ];

    public function mount()
    {
        $route = Route::current()->getName();

        //dd($route);
        if($route == 'playlist')
        {
            $playlist = Playlist::findOrFail($this->playlist->id);
            //dd($playlist);
        }else {
            $post = Post::findOrFail($this->post->id);
        }
        //dd($post->id);
    }

    public function addComment()
    {
        $this->validate();

        Comment::create([
            'author'=> $this->author,
            'body'=>$this->body,
            'post_id'=> $this->post->id,
            'playlist_id'=>$this->playlist->id,
        ]);

        $comment = Comment::latest()->first();
        //dd($comment);

        event(new CommentCreated($comment));
        
        $this->author = "";
        $this->body = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
