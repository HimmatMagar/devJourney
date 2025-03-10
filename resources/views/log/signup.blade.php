<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
    .password-toggle {
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(5%);
        background: none;
        border: none;
    }

    .position-relative {
        position: relative;
    }

    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4" style="width: 400px;">
            <h3 class="mb-3 text-center">Sign Up</h3>
            <form id="signupForm" action="{{ route('signup') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="bi bi-eye"></i> <!-- Bootstrap Eye Icon -->
                    </button>
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3 position-relative">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmPassword" name="password_confirmation" placeholder="Confirm your password">
                    <button type="button" class="password-toggle" id="toggleConfirmPassword">
                        <i class="bi bi-eye"></i> <!-- Bootstrap Eye Icon -->
                    </button>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                <div class="text-center">
                    <p>Already have an account?<a href="{{ route('loginPage') }}"> Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- JavaScript for Toggle Password -->
    <script src="js/scripts.js"></script>
</body>
</html>