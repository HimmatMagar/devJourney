<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/DevJourner.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <style>
            body {
              background-color: #f8f9fa;
            }
            .header-section {
              padding: 60px 0;
              background-color: #58717D;
              color: white;
              text-align: center;
              margin-bottom: 5px;
            }
            .about-section {
              padding: 60px 0;
            }
            .about-section h1 {
              font-size: 2.5rem;
              font-weight: bold;
              margin-bottom: 20px;
            }
            .about-section h2 {
              font-size: 2rem;
              font-weight: bold;
              margin-top: 30px;
              margin-bottom: 15px;
            }
            .about-section p {
              font-size: 1.1rem;
              line-height: 1.8;
              color: #555;
            }
            .about-section .lead {
              font-size: 1.25rem;
              font-weight: 300;
            }
            .welcome-section {
              padding: 60px 0;
              background-color: #567C8D;
              color: white;
              text-align: center;
            }
            .posts-section {
              padding: 40px 0;
            }
            .post-card {
              margin-bottom: 20px;
              border: 1px solid #ddd;
              border-radius: 10px;
              overflow: hidden;
              background-color: white;
            }
            .post-card img {
              width: 100%;
              height: 200px;
              object-fit: cover;
            }
            .post-card .card-body {
              padding: 20px;
            }
            .post-card .card-title {
              font-size: 1.5rem;
              font-weight: bold;
            }
            .post-card .card-text {
              color: #555;
            }
            .post-card .badge {
              font-size: 0.9rem;
              margin-right: 5px;
            }
            .post {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            }
            .profile-pic {
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }
            .like-button {
                margin-right: 10px;
            }
            .rotate {
              height: 60px;
              width: 60px;
              background-size: contain;
              mix-blend-mode: screen;
              animation: rotateAnimation 2s infinite linear;
          }

          @keyframes rotateAnimation {
              from {
                  transform: rotate(0deg);
              }
              to {
                  transform: rotate(360deg);
              }
          }
          </style>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <img src="assets/DevJourner.png" alt="logo" class="rotate" style="height: 60px; width: 60px; background-size:contain; mix-blend-mode: screen;transform: rotate(45deg);">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="{{ request() -> is('/') ? 'nav-link active ' : 'nav-link' }}" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="{{ request() -> is('about') ? 'nav-link active' : 'nav-link' }}" href="{{ route('about') }}">About</a></li>
                        <li class="nav-item"><a class="{{ request() -> is('contact') ? 'nav-link active' : 'nav-link' }}" href="{{ route('contact') }}">Contact</a></li>
                       {{-- @can(AuthCheck::class) --}}
                          <li class="nav-item"><a class="{{ request() -> is('blog') ? 'nav-link active' : 'nav-link' }}" aria-current="page" href="{{ route('blog.index') }}">Blog</a></li>
                       {{-- @endcan --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggl" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, {{ Auth::user() -> name }}
                            </a>
                            <ul class="dropdown-menu bg-white shadow-lg rounded-lg" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-gray-700 hover:bg-gray-100" href=""><i class="bi bi-person-circle me-1"></i>Your Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-1"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        @yield('content')

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; DevJourney 2025</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
