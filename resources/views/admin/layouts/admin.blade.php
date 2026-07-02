<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - 🌱 Panel TaniTalks </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">

        <nav class="w-64 bg-slate-900 text-white p-6 shadow-xl">
            <h1 class="text-xl font-bold mb-10 text-yellow-400 tracking-tight">Admin - 🌱 TaniTalks</h1>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="block px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-500 text-slate-900 font-bold' : 'text-gray-400 hover:bg-slate-800 hover:text-white' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kecamatan.index') }}" 
                       class="block px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.kecamatan.*') ? 'bg-yellow-500 text-slate-900 font-bold' : 'text-gray-400 hover:bg-slate-800 hover:text-white' }}">
                        Data Kecamatan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.channel.index') }}" 
                       class="block px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.channel.*') ? 'bg-yellow-500 text-slate-900 font-bold' : 'text-gray-400 hover:bg-slate-800 hover:text-white' }}">
                        Data Channel
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}" 
                       class="block px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.user.*') ? 'bg-yellow-500 text-slate-900 font-bold' : 'text-gray-400 hover:bg-slate-800 hover:text-white' }}">
                        Data User
                    </a>
                </li>
            </ul>
        </nav>

        <main class="flex-1 overflow-y-auto">
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>