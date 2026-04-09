<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeiraOS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">

    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
        <span class="text-xl font-semibold text-gray-800">Peira<span class="text-green-600">OS</span></span>
        <span class="text-sm text-gray-400">Marketing Engine</span>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-10">
        @yield('content')
    </main>

</body>
</html>