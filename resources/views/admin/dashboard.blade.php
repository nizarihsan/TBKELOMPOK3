@extends('layouts.app')

@section('content')
    <div class="flex">
        <aside class="w-64 bg-gray-800 text-white h-screen p-6">
            <h2 class="text-2xl font-bold mb-4">Halaman Utama</h2>
            <ul>
                <li class="mb-2"><a href="{{ route('admin.items.index') }}" class="hover:underline">Kelola Barang Lelang</a></li>
                <li class="mb-2"><a href="{{ route('admin.users.index') }}" class="hover:underline">Kelola Pengguna</a></li>
                <li class="mb-2"><a href="{{ route('admin.bids.index') }}" class="hover:underline">Kelola Tawaran</a></li>
                <li class="mb-2"><a href="{{ route('admin.categories.index') }}" class="hover:underline">Kelola Kategori</a></li>
                <!-- <li class="mb-2"><a href="{{ route('admin.transactions.index') }}" class="hover:underline">Laporan Transaksi</a></li>
                <li class="mb-2"><a href="{{ route(name: 'admin.payments.index') }}" class="hover:underline">Daftar Pembayaran</a></li> -->
            </ul>
        </aside>

        <main class="flex-1 p-6">
            <h2 class="text-2xl font-bold mb-4">Halaman Utama</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">{{ number_format($stats['newUsers']) }}</h3>
                    <p class="text-gray-600">Pengguna Baru Hari Ini</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">{{ number_format($stats['totalOrders']) }}</h3>
                    <p class="text-gray-600">Total Pesanan</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">{{ number_format($stats['availableProducts']) }}</h3>
                    <p class="text-gray-600">Produk Tersedia</p>
                </div>
            </div>

            <div class="mt-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Daftar Pengguna</h3>
                    <a href="{{ route('admin.users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Lihat Semua Pengguna</a>
                </div>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Peran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-200' }}">
                                        {{ $user->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
