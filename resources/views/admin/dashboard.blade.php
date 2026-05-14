@extends('admin.layouts.admin')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, Admin!</h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-blue-500 text-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold">Total Kecamatan</h3>
        <p class="text-4xl font-bold">{{ $totalKecamatan }}</p>
    </div>
    <div class="bg-green-500 text-white p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold">Total Channel</h3>
        <p class="text-4xl font-bold">{{ $totalChannel }}</p>
    </div>
</div>
@endsection