@extends('layout.structure')
@section('title')
    single post
@endsection
@section('content')

<div class="container w-50 mt-5">
    <div class="card">
        <img src="{{ asset('storage/uploads/' . $post->image) }}" style="width: 100%; border-radius: 10px" alt="Post Image" class="post-image card-img-top">
        <div class="card-body">
            <h5 class="post-title">{{ $post->title }}</h5>
            <p class="post-description">{{ $post->description }}</p>
            <p class="text-muted">Posted by: {{ $post-> relToUser ->name }} on {{ $post->created_at }}</p>

            <!-- Like Button -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-light" id="likeButton">👍 Like <span id="likeCount">4</span></button>
            </div>

            <!-- Comments Section -->
            <h6>Comments:</h6>
            {{-- <div id="commentsSection">
                @if($post->comments)
                    <p>No comments yet.</p>
                @else
                    @foreach($post->comments as $comment)
                        <div class="border p-2 mb-2"> --}}
                            {{-- <strong>{{ $comment->user->name }}</strong> --}}
                            {{-- <p>{{ $comment->content }}</p> --}}
                        {{-- </div>
                    @endforeach
                @endif
            </div> --}}

            <!-- Comment Input -->
            <div class="mt-3">
                <textarea class="form-control" id="commentInput" placeholder="Add a comment..." rows="2"></textarea>
                <button class="btn btn-primary mt-2" id="submitComment">Submit Comment</button>
            </div>
        </div>
    </div>
    <a href="{{ route('home') }}" class="btn btn-secondary mt-3 mb-3">Back to Posts</a>
</div>

@endsection