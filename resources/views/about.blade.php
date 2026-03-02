<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-white border-b border-gray-100 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="font-bold text-xl text-gray-800">My App</div>
            <div class="space-x-4">
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-gray-900">About</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Log in</a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Register</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-6 border-b pb-2">Tentang Saya</h2>
                    <div class="space-y-3">
                        <p><strong>Nama :</strong> Moza Kastella</p>
                        <p><strong>NIM :</strong> 20230140111</p>
                        <p><strong>Program Studi :</strong> Teknologi Informasi</p>
                        <p><strong>Hobi :</strong> Baca Buku</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>