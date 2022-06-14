<?php

namespace App\Listeners;

use App\Models\Post;
use App\Mail\CommentMail;
use App\Events\CommentCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailCommentCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        $comment = $event->comment->body;
        $author = $event->comment->author;
        $post = Post::findOrFail($event->comment->post_id);

        $mailData = [
            'title' => 'Mail de DarkImmortal.fr',
            'comment' => $comment,
            'author' => $author,
            'post' => $post,
        ];
        //dd($mailData);

        Mail::to('advitameternam@gmail.com')->send(new CommentMail($mailData));
    }
}
