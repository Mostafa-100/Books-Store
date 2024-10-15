<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-body">
    {{ $slot }}
    <script src="https://kit.fontawesome.com/9e56a67cbb.js" crossorigin="anonymous"></script>
</body>

</html>
