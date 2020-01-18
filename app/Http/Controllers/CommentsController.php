<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;

class CommentsController extends Controller
{
    /**
    * Creates a new comment and store's it.
    * @return void
    */
    public function store() {
        $data = request()->validate([
            'comment' => ['required', 'max:250'],
            'image' => ['image', 'max:4'],
        ]);

        auth()->user()->comments()->create([
            'comment' => $data['comment'],
            'image' => $data['image'],
        ]);
    }

    /**
    * Deletes a comment bassed on a POST'ed comment id.
    * @return void
    */
    public function delete()
    {
        $comment = Comment::findOrFail(request('comment_id'));

        if ($comment->belongsTo(auth()->user())) {
            DB::delete('delete from student_details where id = ?',[$comment->id]);
        }
    }
}
