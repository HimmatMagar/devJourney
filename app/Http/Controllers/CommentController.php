<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $postId) {
        $commentExits = Comment::where('user_id', $request -> user() -> id)
                        -> where('post_id', $postId) -> exists();
        if(!$commentExits) {
            Comment::create([
                'comment' => $request -> comment,
                'user_id' => $request -> user() -> id,
                'post_id' => $postId,
            ]);
        }
        Comment::findOrFail($postId);
        // return view('home', compact('comment'));
        return redirect() -> route('home');
    }
}
