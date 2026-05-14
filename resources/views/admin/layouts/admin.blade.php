<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Panel Ngobrol Bareng Petani</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">

        <nav class="w-64 bg-slate-800 text-white p-6">
            <h1 class="text-xl font-bold mb-8 text-yellow-500">Ngobrol Bareng Petani</h1>
            <ul>
                <li class="mb-4"><a href="{{ route('admin.dashboard') }}" class="hover:text-yellow-400">Dashboard</a></li>
                <li class="mb-4"><a href="{{ route('admin.kecamatan.index') }}" class="text-yellow-400 font-semibold">Data Kecamatan</a></li>
                <li class="mb-4"><a href="{{ route('admin.channel.index') }}" class="hover:text-yellow-400">Data Channel</a></li>
                <li class="mb-4"><a href="{{ route('admin.user.index') }}" class="hover:text-yellow-400">Data User</a></li>
            </ul>
        </nav>

        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>