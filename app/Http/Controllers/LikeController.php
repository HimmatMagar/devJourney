<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function giveLike(Request $request, $post_id) {
        #check if the user has already like the post
        $likeExist = Like::where('user_id', $request -> user() -> id)
                    -> where('post_id', $post_id) -> exists();

       if(!$likeExist) {
            Like::create([
                'user_id' => $request -> user() -> id,
                'post_id' => $post_id
            ]);
       }
       return redirect() -> route('home');
    }
}
