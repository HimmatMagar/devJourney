<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-icon {
            font-size: 50px;
            margin-bottom: 15px;
            color: #007bff;
        }
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
    <div class="container">
        <div class="login-container bg-white p-4 text-center">
            <i class="fas fa-user-circle login-icon"></i>
            <h3>Login</h3>
            @if (session('status'))
              <script>
                alert("{{ session('status') }}")
              </script>
            @endif
            @if (session('error'))
            alert("{{ session('error') }}")
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Enter your email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 position-relative text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="bi bi-eye"></i> <!-- Bootstrap Eye Icon -->
                    </button>
                </div>
                <div class="mb-3 text-center">
                    <a href="#" class="text-primary">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <div class="text-center mt-1">
                    <p>Didn't have any account?<a href="{{ route('signupPage') }}"> Signup</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
