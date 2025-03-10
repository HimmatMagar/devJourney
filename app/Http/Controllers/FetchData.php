<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FetchData extends Controller
{
    public function searchFunction(Request $request) {
        $query = $request->input('query');
        
        if ($query) {
            $post = Post::where(function($q) use ($query) {
                    $q->orWhere('title', 'like', '%' . $query . '%')
                        ->orWhere('category', 'like', '%' . $query . '%');
                })
                ->orWhereHas('relToUser', function($q) use ($query) {
                    $q -> orWhere('name', 'like', '% . $query . %');
                })->paginate(4);
            // dd($post);
        } else {
            $post = Post::with(['relToUser', 'like', 'comment']) -> paginate(4);
        }
        return view('home', [
            'post' => $post,
            'query' => $query
        ]);
    }

    public function showOnePost(string $id) {
        $post = Post::with('relToUser') -> findOrFail($id);
        return view('onePost', compact('post'));
    }
}
