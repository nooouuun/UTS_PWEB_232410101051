<!DOCTYPE html>
<html lang="en" class="h-full bg-[#C8D5D7]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dooing</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="min-h-screen flex flex-col bg-[#C8D5D7] text-gray-900 text-xl">
    @include('components.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
