<!-- resources/views/filament.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Tambahkan tag-script untuk memuat file JavaScript Anda -->
    <script src="{{ asset('js/filament/custom.js') }}"></script>
    <!-- Anda juga bisa menambahkan tag-link untuk memuat file CSS jika diperlukan -->
</head>
<body>
    <!-- Konten aplikasi -->
    @yield('content')
</body>
</html>
