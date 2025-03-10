@extends('layout/structure')
@section('title')
    DevJourney-Update
@endsection
@section('content')
<div class="container mt-1">
    <h2 class="text-center mb-4">Update Post</h2>
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2"> <!-- Center the form -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $post -> description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Leave blank to keep the current image.</small>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="" disabled>Select a category</option>
                                <option value="technology" {{ $post->category == 'technology' ? 'selected' : '' }}>Technology</option>
                                <option value="lifestyle" {{ $post->category == 'lifestyle' ? 'selected' : '' }}>Life-style</option>
                                <option value="health" {{ $post->category == 'health' ? 'selected' : '' }}>Health</option>
                                <option value="CSS" {{ $post->category == 'CSS' ? 'selected' : '' }}>CSS</option>
                                <option value="Tutorials" {{ $post->category == 'Tutorials' ? 'selected' : '' }}>Tutorials</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Post</button>
                        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection