<x-guest-layout>
    <div class="fixed inset-0 min-h-screen grid grid-cols-1 lg:grid-cols-12 font-sans bg-slate-50">
        
        <div class="hidden lg:flex lg:col-span-5 relative items-center p-12 overflow-hidden bg-cover bg-center">
            
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-green-800/80 to-emerald-950/90 z-0"></div>
            
            <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-emerald-500/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 text-white max-w-md">
                <div class="bg-white/10 backdrop-blur-md w-14 h-14 rounded-2xl flex items-center justify-center text-2xl shadow-inner mb-6 border border-white/20">
                    🌱
                </div>
                <h2 class="text-3xl font-extrabold tracking-tight leading-tight mb-4 drop-shadow-sm">
                    Selangkah Lebih Dekat dengan Komunitas Tani Modern
                </h2>
                <p class="text-green-100 text-sm leading-relaxed drop-shadow-sm">
                    Dapatkan solusi hama, berbagi tips pupuk, dan pantau harga pasar langsung dari genggaman Anda.
                </p>
            </div>
            <div class="absolute bottom-6 left-12 text-xs text-green-200/60 z-10">
                &copy; 2026 TaniTalks Indonesia
            </div>
        </div>

        <div class="col-span-1 lg:col-span-7 flex flex-col justify-center px-6 sm:px-12 lg:px-20 py-12 bg-white overflow-y-auto">
            <div class="max-w-md w-full mx-auto">
                
                <div class="mb-8">
                    <div class="lg:hidden bg-green-100 text-green-700 w-12 h-12 rounded-xl flex items-center justify-center text-xl mb-4">🌱</div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">Daftar Akun TaniTalks</h1>
                    <p class="text-sm text-slate-500 mt-2">Gabung sekarang dan mulai berdiskusi dengan petani lainnya.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition duration-200">
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Alamat Email (Gunakan Huruf Kecil)</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="contoh@gmail.com"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition duration-200">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Kata Sandi</label>
                        <input id="password" type="password" name="password" required placeholder="Minimal 8 karakter"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition duration-200">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Konfirmasi Kata Sandi</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Ulangi kata sandi"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-500 transition duration-200">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl text-sm shadow-md shadow-green-600/10 hover:shadow-lg hover:shadow-green-600/20 transition duration-300 uppercase tracking-wide">
                            Daftar Sekarang 🚀
                        </button>
                    </div>

                    <div class="text-center pt-4">
                        <p class="text-sm text-slate-500">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="font-bold text-green-600 hover:text-green-700 transition underline decoration-2">Masuk di sini</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>