<x-guest-layout>
    <div class="fixed inset-0 min-h-screen grid grid-cols-1 lg:grid-cols-12 font-sans bg-slate-50">
        
        <div class="hidden lg:flex lg:col-span-5 relative items-center p-12 overflow-hidden bg-cover bg-center">
            
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-green-800/80 to-emerald-950/90 z-0"></div>
            
            <div class="absolute -top-20 -right-20 w-80 h-80 bg-green-500/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 text-white max-w-md">
                <div class="bg-white/10 backdrop-blur-md w-14 h-14 rounded-2xl flex items-center justify-center text-2xl shadow-inner mb-6 border border-white/20">
                    🌱
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight leading-tight mb-4 drop-shadow-sm">
                    Selamat Datang Kembali di TaniTalks
                </h2>
                <p class="text-green-100 text-sm leading-relaxed drop-shadow-sm">
                    Masuk untuk melihat diskusi terbaru, info komoditas, dan berinteraksi langsung dengan sesama komunitas petani.
                </p>
            </div>
            <div class="absolute bottom-6 left-12 text-xs text-green-200/60 z-10">
                &copy; 2026 TaniTalks Indonesia
            </div>
        </div>

        <div class="col-span-1 lg:col-span-7 flex flex-col justify-center px-6 sm:px-12 lg:px-20 py-12 bg-white">
            <div class="max-w-md w-full mx-auto">
                
                <div class="mb-8">
                    <div class="lg:hidden bg-green-100 text-green-700 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-4">🌱</div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">Masuk ke Akun Anda</h1>
                    <p class="text-sm text-slate-500 mt-2">Silakan masukkan email dan kata sandi yang telah terdaftar.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Alamat Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="contoh@gmail.com"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition duration-200">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-semibold text-green-600 hover:text-green-700 transition" href="{{ route('password.request') }}">
                                    Lupa sandi?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required placeholder="Masukkan kata sandi"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition duration-200">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 text-green-600 shadow-sm focus:ring-green-500">
                        <label for="remember_me" class="ml-2 text-sm text-slate-600 font-medium select-none">Ingat akun saya</label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl text-sm shadow-md shadow-green-600/10 hover:shadow-lg hover:shadow-green-600/20 transition duration-300 uppercase tracking-wide">
                            Masuk Aplikasi ⚡
                        </button>
                    </div>

                    <div class="text-center pt-4">
                        <p class="text-sm text-slate-500">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="font-bold text-green-600 hover:text-green-700 transition underline decoration-2">Daftar di sini</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>