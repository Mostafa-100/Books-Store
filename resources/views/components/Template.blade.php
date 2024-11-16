<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/glide.core.min.css', 'resources/css/glide.theme.min.css'])
</head>

<body class="font-body">
    @yield('content')
    <script src="https://kit.fontawesome.com/9e56a67cbb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
</body>

</html>
