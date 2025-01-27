@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="py-8 px-4 mx-auto max-w-6xl lg:py-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Manajemen Pengguna</h2>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:ring-gray-300">
                Kembali ke Dasbor
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-sm text-gray-600">
                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Nama</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Peran</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300" onclick="return confirm('Apakah Anda yakin?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
