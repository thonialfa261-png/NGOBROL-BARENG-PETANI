@extends('admin.layouts.admin')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Tambah Channel Baru</h2>
</div>

<div class="bg-white rounded-xl shadow p-6 max-w-lg">
    <form action="{{ route('admin.channel.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Channel</label>
        <input type="text" name="nama_channel" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan nama channel (contoh: Petani Jagung)" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Kecamatan</label>
        <select name="kecamatan_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="">-- Pilih Kecamatan --</option>
            @foreach($kecamatans as $kec)
                <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex gap-2">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
            Simpan Data
        </button>
        <a href="{{ route('admin.channel.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-center">
            Batal
        </a>
    </div>
</form>
</div>
@endsection