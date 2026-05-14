@extends('admin.layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Manajemen User</h2>
    <a href="{{ route('admin.user.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">+ Tambah User</a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Nama</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="border-b">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4 font-semibold">{{ $user->name }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4 text-red-600">
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection