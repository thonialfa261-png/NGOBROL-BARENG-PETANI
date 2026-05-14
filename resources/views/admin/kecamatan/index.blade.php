@extends('admin.layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Kecamatan</h2>
    <a href="{{ route('admin.kecamatan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        + Tambah Kecamatan
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4 font-semibold text-gray-700">No</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Nama Kecamatan</th>
                <th class="px-6 py-4 font-semibold text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($kecamatans as $index => $item)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4 font-medium">{{ $item->nama_kecamatan }}</td>
                <td class="px-6 py-4 flex items-center">
                <a href="{{ route('admin.kecamatan.edit', $item->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
                <form action="{{ route('admin.kecamatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kecamatan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-6 py-10 text-center text-gray-500 italic">
                    Belum ada data kecamatan. Silakan tambah data baru.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection