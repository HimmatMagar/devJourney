@extends('layout.structure')
@section('title')
    DevJourney/post
@endsection
@section('content')
    
<section class="welcome-section">
    <div class="container">
      <h1>Welcome, {{ Auth::user() -> name }}!</h1>
      <p class="lead">Publish your thoughts, share your knowledge, and inspire the DevJourney community.</p>
      <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#postModal">
        Publish a New Post
      </button>
    </div>
  </section>

  <!-- Published Posts Section -->
  <section class="posts-section">
    <div class="container">
        <h2 class="text-center mb-4">Your Published Posts</h2>
        <div class="row">
            <!-- Check if there are no posts -->
            @if ($posts->isEmpty())
                <h1>No Posts Found</h1>
            @else
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="post-card">
                            <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="Post Image" class="img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->description, 100, '...') }}</p> <!-- Truncated description -->
                                <div class="mb-3">
                                    <span class="badge bg-primary">{{ $post->category }}</span>
                                </div>
                                <div>
                                    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-sm btn-info px-4 py-2">Edit</a>
                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-light" id="likeButton-{{ $post->id }}">👍 Like <span id="likeCount-{{ $post->id }}">{{ $post-> likeCount }}</span></button>
                                    <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary btn-sm">View Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
  <!-- Modal for Publishing a New Post -->
  <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Add a New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Post Form -->
                <form id="postForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <div class="mb-3 text-start">
                        <label for="postTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="postTitle" required
                               aria-describedby="titleHelp" maxlength="100">
                        <div id="titleHelp" class="form-text">Enter a catchy title for your post (max 100 characters).</div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3 text-start">
                        <label for="postDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="postDescription" name="description" rows="4" required
                                  aria-describedby="descriptionHelp" maxlength="500"></textarea>
                        <div id="descriptionHelp" class="form-text">Write a brief description of your post (max 500 characters).</div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3 text-start">
                        <label for="postImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="postImage" name="image" accept="image/*" required
                               aria-describedby="imageHelp">
                        <div id="imageHelp" class="form-text">Upload a high-quality image (JPEG, PNG, or GIF).</div>
                    </div>

                    <!-- Category -->
                    <div class="mb-3 text-start">
                        <label for="postCategory" class="form-label">Category</label>
                        <select class="form-select" name="category" id="postCategory" required
                                aria-describedby="categoryHelp">
                            <option value="">Select a Category</option>
                            <option value="technology">Technology</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="health">Health</option>
                        </select>
                        <div id="categoryHelp" class="form-text">Choose the most relevant category for your post.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary" form="postForm">Publish Post</button>
            </div>
        </div>
    </div>
  </div>

@endsection