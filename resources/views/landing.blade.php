<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vanguard - Informatics 24 Sultan Ageng Tirtayasa</title>
    <link rel="icon" href="{{ asset('images/Vanguard-Logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
</head>

<body>
    <div class="toast-container" id="toastContainer"></div>

    {{-- Navbar Section --}}
    @include('partials.navbar')

    {{-- Hero Section --}}
    @include('partials.hero')

    {{-- About Section --}}
    @include('partials.about')

    {{-- Leader Section --}}
    @include('partials.leader')

    {{-- Prestasi Section --}}
    @include('partials.prestasi')

    {{-- Gallery Section --}}
    @include('partials.gallery')

    {{-- Notes Section --}}
    @include('partials.notes')

    {{-- Schedule Section --}}
    @include('partials.schedule')

    {{-- Birthday Section --}}
    @include('partials.birthday')

    {{-- Footer Section --}}
    @include('partials.footer')

    <script src="{{ asset('script.js') }}"></script>
</body>

</html>