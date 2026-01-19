<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gayo Origin Admin</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('kopi.png') }}" type="image/png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4E6;
            /* Cream */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .btn-coffee {
            background-color: #4B3832;
            color: white;
            transition: 0.3s;
        }

        .btn-coffee:hover {
            background-color: #3a2b26;
            color: white;
        }
    </style>
</head>

<body>
    <div class="card p-4" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h4 class="text-center fw-bold mb-4" style="color: #4B3832;">Admin Login</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-coffee py-2">Masuk</button>
                </div>
                <!-- Register Link Removed -->
            </form>
        </div>
    </div>
</body>

</html>
