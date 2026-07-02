<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TaniTalks - Autentikasi</title>

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body class="bg-gradient-to-br from-green-50 via-slate-50 to-emerald-50 text-slate-800 antialiased min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        
        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white border border-slate-200/60 shadow-xl shadow-green-900/5 rounded-3xl relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-24 h-24 bg-green-100 rounded-full blur-xl"></div>
            
            <div class="flex flex-col items-center mb-8 relative">
                <div class="bg-gradient-to-tr from-green-600 to-emerald-500 p-3 rounded-2xl text-xl text-white shadow-md mb-3">
                    🌱
                </div>
                <span class="text-2xl font-black bg-gradient-to-r from-green-700 to-emerald-600 bg-clip-text text-transparent">TaniTalks</span>
                <p class="text-xs text-slate-400 font-medium mt-1">Komunitas Petani Digital Modern</p>
            </div>

            <div>
                {{ $slot }}
            </div>
        </div>

    </body>
</html>