<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Aplikasi Lomba</title>
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

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Ghatan Adya Pratama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark active" href="/dashboard-admin">Dashboard Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="container my-4">
        <div class="row">
            <!-- Sidebar Menu Admin -->
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning fw-bold text-dark">
                        Menu Panitia
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="/dashboard-admin" class="list-group-item list-group-item-action active bg-dark border-dark">
                            Dashboard
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            Data Peserta
                        </a>
                        <a href="#" class="list-group-item list-group-item-action text-danger fw-bold" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            <!-- Konten Utama Admin -->
            <div class="col-md-9">
                <!-- Banner Welcome -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body bg-white rounded border-start border-warning border-4">
                        <h4 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h4>
                        <p class="text-muted mb-0">
                            Anda masuk sebagai 
                            <span class="badge bg-warning text-dark">{{ strtoupper(Auth::user()->role) }}</span>.
                        </p>
                    </div>
                </div>

                <!-- Info Ringkas -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm bg-warning text-dark">
                            <div class="card-body">
                                <h6 class="text-uppercase fw-semibold mb-2">Total Pendaftar Lomba</h6>
                                <h2 class="display-6 fw-bold mb-0">{{ isset($pesertas) ? $pesertas->count() : 0 }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm bg-dark text-white">
                            <div class="card-body">
                                <h6 class="text-uppercase fw-semibold text-warning mb-2">Akses Halaman</h6>
                                <h2 class="fs-4 fw-bold mb-0">Terkunci (Admin Only) 🔒</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data Peserta -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white fw-bold py-3">
                        Daftar Peserta Terdaftar
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Peserta</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pesertas as $index => $peserta)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peserta->name }}</td>
                                        <td>{{ $peserta->email }}</td>
                                        <td>
                                            @if(($peserta->status ?? '') == 'Terverifikasi')
                                                <span class="badge bg-success">Terverifikasi</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            Belum ada data pendaftar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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