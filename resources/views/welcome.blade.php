<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Pranayama</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('pranayama.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-white to-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl max-w-5xl w-full p-0 overflow-hidden grid grid-cols-1 md:grid-cols-12 items-center">
        <!-- LEFT: TEXT & LOGO -->
        <div class="col-span-12 md:col-span-7 px-10 py-10 text-center md:text-left">
            <img src="{{ asset('images/pranayama.jpeg') }}" alt="Pranayama Logo"
                 class="w-24 h-24 mx-auto md:mx-0 mb-6 object-contain">

            <h1 class="text-4xl font-bold text-gray-800 mb-2">Selamat Datang di</h1>
            <h2 class="text-3xl font-semibold text-black mb-6">Pranayama</h2>

            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-black text-white rounded-lg shadow hover:bg-gray-800 transition duration-300">Login</a>
                <a href="{{ route('register') }}" class="px-6 py-3 bg-white border border-black text-black rounded-lg shadow hover:bg-gray-100 transition duration-300">Register</a>
            </div>
        </div>

        <!-- RIGHT: Gambar Penuh Nempel -->
        <div class="col-span-12 md:col-span-5">
            <img src="{{ asset('images/Kopi.png') }}"
                 alt="Coffee Illustration"
                 class="w-full h-full object-cover" />
        </div>
    </div>

</body>
</html>
