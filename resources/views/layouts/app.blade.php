<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rick & Morty App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-4 font-sans">
    <div class="max-w-7xl mx-auto">
        @yield('content')
    </div>
</body>
</html>