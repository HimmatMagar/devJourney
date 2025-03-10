<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id()) -> get();
        return view('blog', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credientails = $request -> validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,webp,avif|max:5120',
            'category' => 'required'
        ]);
        if($credientails) {
            $img = $request -> file('image');
            $ext = $img -> getClientOriginalExtension();
            $image = time() . '.' . $ext;
            $img -> storeAs('uploads', $image, 'public');

            Post::create([
                'title' => $request -> title,
                'description' => $request -> description,
                'image' => $image,
                'category' => $request -> category,
                'user_id' => Auth::id()
            ]);
            return redirect() -> route('blog.index') -> with('status', 'Post publish Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $onePost = Post::select('title, category, image, description') -> where('id', $post -> id) -> get();
        return view('blade', compact('onePost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,webp,avif|max:5120',
            'category' => 'required'
        ]);
        $post = Post::find($id);
        if($request -> hasFile('image')) {
            $imagePath = public_path('storage/uploads/') . $post -> image;
            if(file_exists($imagePath)) {
                unlink($imagePath);
            }

            $img = $request -> file('image');
            $ext = $img -> getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img -> storeAs('uploads', $imageName, 'public');

            $post -> title = $request -> title;
            $post -> description = $request -> description;
            $post -> image = $imageName;
            $post -> category = $request -> category;
            $post -> save();
            return redirect() -> route('blog.index') -> with('status', 'Post Updated successfully');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $imagePath = public_path('storage/uploads/') . $post -> image;
            if(file_exists($imagePath)) {
                unlink($imagePath);
            }
        $post -> delete();
        return redirect() -> route('blog.index') -> with('status', 'Post delete successfully');
    }
}
