@extends('layout/structure')
@section('title')
    DevJourney
@endsection

@section('content')
    <!-- Page header with logo and tagline-->
    <header class="header-section">
        <div class="container">
          <h1 class="fw-bold">Welcome to DevJourney</h1>
          <p class="lead">Explore the latest posts, learn new skills, and join a community of passionate developers.</p>
        </div>
      </header>

    @if (session('status'))
        <script>
            alert("{{ session('status') }}")
        </script>
    @endif
    
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries -->
            <div class="col-lg-8">
                <!-- Featured blog post -->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2023</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
    
                <!-- Nested row for non-featured blog posts -->
                @if ($query)
                    <h2>Your search result is {{ $query }}</h2>
                @endif
                <div class="row">
                    @foreach ($post as $item)
                   {{-- {{ dd($item) }} --}}
                        <div class="col-lg-6"> <!-- Each post takes 6 columns (2 posts per row) -->
                            <div class="card mb-4">
                                <img class="card-img-top" src="{{ asset('storage/uploads/' . $item->image) }}" alt="image" />
                                <div class="card-body">
                                    <div class="small text-muted">{{ $item->created_at}} by {{ $item->relToUser ->name }}</div>
                                    <h2 class="card-title h4">{{ $item->title }}</h2>
                                    <p class="card-text">
                                        {{ Str::limit($item->description, 100, '...') }} <!-- Limit description to 100 characters -->
                                        <a href="{{ route('show', $item->id) }}">Read more</a>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form action="{{ route('like', $item -> id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-light" type="submit">👍 Like <span>{{ $item -> likeCount }}</span></button>
                                        </form>
                                        <a class="btn btn-primary" href="{{ route('show', $item->id) }}">Read more →</a>
                                    </div>
                                    <div class="mt-2">
                                        <h6>Comments:</h6>
                                        <div id="commentsSection-{{ $item->id }}">
                                            @if($item->comment->isEmpty())
                                                <p>No comments yet.</p>
                                            @else
                                                @foreach($item -> comment as $comment)
                                                    <div class="border p-2 mb-2">
                                                        <strong>{{ $comment-> user ->name }}</strong>
                                                        <p>{{ $comment -> comment }}</p>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <form action="{{ route('comment', $item -> id) }}" method="POST">
                                            @csrf
                                            <textarea class="form-control mt-2" name="comment" id="comment" placeholder="Add a comment..." rows="2"></textarea>
                                            <button class="btn btn-primary mt-2" type="submit">Submit Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="m-3">
                        {{ $post->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
    
            <!-- Side widgets -->
            <div class="col-lg-4">
                <!-- Search widget -->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <form action="{{ route('home') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control" type="text" name="query" value="{{ $query ?? '' }}" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                        </form>
                    </div>
                </div>
    
                <!-- Categories widget -->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Side widget -->
                <div class="card mb-4">
                    <div class="card-header">Today's Date & Time</div>
                    <div class="card-body">Date: {{ date('Y-m-d') }}</div>
                    <div class="card-body">Time: {{ date('H:i:s') }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection