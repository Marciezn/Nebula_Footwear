<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <title>Admin Dashboard — Jasa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- ChartJS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('websepatu/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('websepatu/adminproduk.css') }}" />
    <link rel="stylesheet" href="{{ asset('websepatu/adminkategori.css') }}" />

</head>
<body>

    <!-- SIDEBAR -->
    <x-sidebar></x-sidebar>

    <!-- WRAPPER (isi dashboard) -->
    <div class="admin-wrapper">

        <!-- HEADER -->
        <header class="admin-header">
            <div class="hello">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div>
                    <div style="opacity:.9;font-weight:600">
                        Selamat datang, {{ auth()->user()->name }}
                    </div>
                    <div class="muted">Pantau performa bisnis & tim pekerja</div>
                </div>
            </div>

            <div class="actions">
                <input class="search" placeholder="Cari transaksi, pelanggan, pekerja..." />
                <button class="btn" id="btnRefresh">Refresh</button>
                <button class="btn primary" id="btnExport">Export Data</button>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="admin-content">
            {{ $slot }}
        </main>

    </div>

<script src="{{ asset('websepatu/dashboard.js') }}"></script>
<script src="{{ asset('websepatu/adminkategori.js') }}"></script>
</body>
</html>
