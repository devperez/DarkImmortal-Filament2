<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use App\Events\CommentCreated;

class Comments extends Component
{

    public $author;
    public $body;
    public $post;
    public $comments;

    protected $rules = [
        'author' => 'required|max:20',
        'body' => 'required|string',
    ];

    public function mount()
    {
        $post = Post::findOrFail($this->post->id);
        //dd($post->id);
    }

    public function addComment()
    {
        $this->validate();

        Comment::create([
            'author'=> $this->author,
            'body'=>$this->body,
            'post_id'=> $this->post->id,
        ]);

        $comment = Comment::latest()->first();
        //dd($comment);

        event(new CommentCreated($comment));
        
        $this->author = "";
        $this->body = "";
    }

    public function render()
    {
        // $comments = Comment::where('post_id', '=', $this->post->id)->where('check', '=', '1')->get();
        // $comments = json_decode($comments, true);

        // dd($comments);
        // $comments = Comment::where('post_id', '=', $this->post->id);
        // dd($this->post->id);
        return view('livewire.comments');
    }
}
