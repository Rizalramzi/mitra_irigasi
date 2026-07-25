<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home | Mitra Irigasi</title>
</head>
<body>
    @auth
    <div class="flex items-center gap-4">
        <span class="text-gray-700 font-medium">Halo, {{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
        
        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-bold py-1.5 px-4 rounded-md transition">
                Logout
            </button>
        </form>
    </div>
@else
    <div class="flex items-center gap-2">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline px-3 py-1">Login</a>
        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-1.5 px-4 rounded-md">Register</a>
    </div>
@endauth
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-4xl font-bold">Home</h1>
        <a href="/chatbot" class="text-blue-500">Chatbot</a>
    </div>  
</body>
</html>