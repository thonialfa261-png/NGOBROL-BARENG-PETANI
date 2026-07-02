<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaniTalks - Komunitas Tani Digital</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 via-slate-50 to-emerald-50 text-slate-800 min-h-screen">

    <nav class="sticky top-0 z-50 backdrop-blur-md bg-white/70 border-b border-slate-200/50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-tr from-green-600 to-emerald-500 p-2 rounded-xl text-white shadow-md">
                    🌱
                </div>
                <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-green-700 to-emerald-600 bg-clip-text text-transparent">TaniTalks</span>
            </div>
            
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition duration-300">
                            Masuk Aplikasi ⚡
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-green-600 transition">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-md transition duration-300">
                                Daftar Akun
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header class="relative max-w-7xl mx-auto px-6 pt-16 pb-12 text-center">
        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200 mb-6 uppercase tracking-wider">
            🚀 Komunitas Petani Era 4.0
        </span>
        <h1 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tight mb-6 leading-tight">
            Tempat Ngumpulnya Petani Modern <br>
            <span class="bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">Saling Berbagi Solusi</span>
        </h1>
        <p class="text-slate-600 max-w-2xl mx-auto mb-10 text-sm md:text-base leading-relaxed">
            Akses info hama, strategi pupuk, dan pergerakan harga pasar langsung dari HP-mu. Gabung bersama ribuan petani lainnya hari ini.
        </p>
    </header>

    <main class="max-w-7xl mx-auto px-6 pb-24">
        <div class="border-b border-slate-200 pb-4 mb-8">
            <h2 class="text-2xl font-bold text-slate-900">Saluran Diskusi Aktif</h2>
            <p class="text-sm text-slate-500 mt-1">Wajib daftar akun atau login terlebih dahulu untuk bergabung ke dalam obrolan</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($channels as $chan)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="bg-slate-100 text-slate-700 text-[11px] font-bold px-2.5 py-1 rounded-lg border border-slate-200">
                                📍 {{ $chan->kecamatan->nama_kecamatan ?? 'Umum' }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">
                            {{ $chan->nama_channel }}
                        </h3>
                        <p class="text-slate-500 text-xs md:text-sm leading-relaxed line-clamp-3">
                            {{ $chan->description ?? 'Selamat datang di ruang diskusi petani! Mari mulai mengobrol, berkonsultasi, dan bertukar informasi demi hasil panen yang melimpah.' }}
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('chat.join', $chan->id) }}" class="w-full flex items-center justify-center gap-2 bg-slate-50 hover:bg-green-600 text-slate-700 hover:text-white font-bold py-3 px-4 rounded-xl transition duration-200 text-xs">
                            Gabung Obrolan 💬
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-2xl border border-dashed border-slate-300">
                    <p class="text-slate-400 font-medium text-sm">Belum ada saluran obrolan yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 py-8 text-center text-[11px] font-bold text-slate-400 tracking-wider uppercase">
        &copy; 2026 TaniTalks Indonesia. All Rights Reserved.
    </footer>

</body>
</html>