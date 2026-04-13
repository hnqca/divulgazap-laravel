<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', env('APP_NAME'))</title>

    <meta charset="UTF-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Find and share WhatsApp groups based on your interests: studies, work, tech, gaming, friendship, and more.">
    <meta name="keywords"    content="whatsapp groups, join whatsapp groups, whatsapp group links, find whatsapp communities, share whatsapp group, whatsapp group invite, interest-based groups">
    <meta name="author"      content="{{ env('APP_NAME') }}">

    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="Find and Join the Best WhatsApp Groups | {{ env('APP_NAME') }}">
    <meta property="og:description" content="Discover active WhatsApp groups or share your own group to thousands of people.">
    <meta property="og:image"       content="{{ asset('path/to/your/social-preview-image.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Cloudflare -->
    <link rel="preconnect" href="https://challenges.cloudflare.com">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/images/logo.png" />

    <!-- Global CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/styles.css">

    <!-- Page CSS -->
    @yield('styles')
</head>
<body>

    <!-- Navigation -->
    @include('components.navbar')

    <!-- Content -->
    <div id="content-app">
        @yield('content')
    </div>
    <!-- / Content -->
    
    <!-- Footer -->
    @include('components.footer')

    <!-- Global JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0-rc.1/jquery.min.js" integrity="sha512-MXe5EK5gyK+fbhwQy/dukwz9fw71HZcsM4KsyDBDTvMyjymkiO0M5qqU0lF4vqLI4VnKf1+DIKf1GM6RFkO8PA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    @yield('scripts')
</body>
</html>