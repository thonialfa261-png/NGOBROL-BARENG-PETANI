<nav x-data="{ open: false }" class="bg-white border-b border-slate-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
<a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
    <div class="flex items-center gap-3">
                <div class="bg-gradient-to-tr from-green-600 to-emerald-500 p-2 rounded-xl text-white shadow-md">
                    🌱
                </div>
                <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-green-700 to-emerald-600 bg-clip-text text-transparent">TaniTalks</span>
                <span class="text-[9px] font-bold text-green-600 uppercase tracking-widest">Komunitas Tani</span>
            </div>
</a>

                <div class="hidden space-x-8 sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-slate-600 hover:text-green-600">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-200 text-sm font-semibold rounded-xl text-slate-700 bg-white hover:bg-slate-50 transition">
                            {{ Auth::user()->name }}
                            <svg class="ms-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>