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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.min.js" integrity="sha512-nKXmKvJyiGQy343jatQlzDprflyB5c+tKCzGP3Uq67v+lmzfnZUi/ZT+fc6ITZfSC5HhaBKUIvr/nTLCV+7F+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0-rc.1/jquery.min.js" integrity="sha512-MXe5EK5gyK+fbhwQy/dukwz9fw71HZcsM4KsyDBDTvMyjymkiO0M5qqU0lF4vqLI4VnKf1+DIKf1GM6RFkO8PA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    @yield('scripts')

</body>
</html>