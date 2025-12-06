<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | {{ $title ?? 'Gerak Cepat' }}</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('websepatu/home.css') }}">
    <link rel="stylesheet" href="{{ asset('websepatu/produk.css') }}">
    <link rel="stylesheet" href="{{ asset('websepatu/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('websepatu/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('websepatu/checkout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    


</head>

<body>

    {{-- NAVBAR USER --}}
    <x-navbar type="user" />

    {{-- CONTENT --}}
    <main class="content-wrapper">
        {{ $slot }}
    </main>

    {{-- JS --}}
    <script src="{{ asset('jasa-barang2/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- TOAST --}}
    @if (session('success') || session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                iconColor: "white",
                customClass: { popup: "colored-toast" },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: "{{ session('success') ? 'success' : 'error' }}",
                title: "{{ session('success') ?? session('error') }}",
            });
        </script>
    @endif

</body>
</html>