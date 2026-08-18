<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panitia - Aplikasi Lomba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Ghatan Adya Pratama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark active" href="/login">Login Panitia</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Form Login -->
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <!-- Notifikasi Error Jika Login Gagal / Ditendang Middleware -->
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->has('email'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('email') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning fw-bold text-center py-3 text-dark fs-5">
                        Login Panitia Lomba 🔒
                    </div>
                    <div class="card-body p-4">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email Panitia</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="admin@sekolah.com" required value="{{ old('email') }}">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100 fw-bold py-2">Masuk ke Dashboard</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <div class="footer border-top">
        <footer>
            <p class="mb-0 text-muted">&copy; 2026 Panitia Kompetisi RPL</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>