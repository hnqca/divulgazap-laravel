<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>@yield('title', env('APP_NAME'))</title>

	<meta charset="UTF-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Encontre e divulgue grupos de WhatsApp por interesses como estudos, trabalho, tecnologia, jogos, amizade e muito mais. Compartilhe o link do seu grupo ou entre em comunidades que combinam com você.">
    <meta name="keywords"    content="grupos de whatsapp, divulgar grupo de whatsapp, links de grupos whatsapp, grupos por interesse, entrar em grupo whatsapp, compartilhar grupo whatsapp, comunidades whatsapp">
    <meta name="author"      content="{{ env('APP_NAME') }}">
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/images/logo.png" />

    <!-- Global CSS -->
    <link rel="stylesheet" href="/assets/css/libs/bootstrap.min.css">
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
    <script src="/assets/js/libs/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/libs/jquery.js"></script>
    <script src="/assets/js/general.js"></script>

    <!-- Page JS -->
    @yield('scripts')

</body>

</html>