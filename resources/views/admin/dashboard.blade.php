@extends('admin.layouts.admin')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">Dashboard Utama</h2>
        <p class="text-gray-500">Selamat datang kembali, pantau aktivitas diskusi petani di sini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Kecamatan</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalKecamatan }}</h3>
                </div>
                <div class="bg-blue-50 p-4 rounded-xl">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Channel</p>
                    <h3 class="text-4xl font-bold text-gray-800 mt-2">{{ $totalChannel }}</h3>
                </div>
                <div class="bg-green-50 p-4 rounded-xl">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <scrip src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</div>
@endsection