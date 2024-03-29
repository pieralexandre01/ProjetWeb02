<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mirror World's festival: Immerse yourself in a world of limitless possibilities and visionary technologies shaping tomorrow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Mirror World' }}</title>
    <link rel="stylesheet" href="https://use.typekit.net/lpp7zdj.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/public/public_general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/' . $css_file . '.css') }}">
</head>

<body>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B3RDE73S4Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-B3RDE73S4Q');
    </script>

    <div id="app" v-cloak>
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}" type="module"></script>

    {{ $scripts ?? '' }}

    @if (session('connexion-cart') && Request::url() == route('login'))
        <script>
            let myModal = new bootstrap.Modal(document.getElementById("message_modal"));
            myModal.show();
        </script>
    @endif

</body>

</html>
