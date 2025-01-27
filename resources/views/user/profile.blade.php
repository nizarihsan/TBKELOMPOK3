@extends('user.layout.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Profile Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-full object-cover" src="{{ $user->avatar ?? 'https://via.placeholder.com/150' }}" alt="{{ $user->name }}">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tentang Saya</h2>
            <p class="text-sm text-gray-600">
                {{ $user->bio ?? 'Pengguna ini belum menambahkan bio.' }}
            </p>
        </div>

        <!-- User Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500 mb-1">Nomor Telepon</h3>
                <p class="text-lg text-gray-900">{{ $user->phone ?? 'Not set' }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500 mb-1">Alamat</h3>
                <p class="text-lg text-gray-900">{{ $user->address ?? 'Not set' }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500 mb-1">Bergabung Sejak</h3>
                <p class="text-lg text-gray-900">{{ $user->created_at->format('F d, Y') }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-sm font-medium text-gray-500 mb-1">Terakhir Diperbarui</h3>
                <p class="text-lg text-gray-900">{{ $user->updated_at->format('F d, Y') }}</p>
            </div>
        </div>

        <!-- Account Actions -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-4">Aksi Akun</h3>
            <div class="flex flex-col gap-3">
                <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                    Edit Profil
                </a>
                <a href="{{ route('password.request') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                    Ubah Kata Sandi
                </a>
                <a href="{{ route('user.updateSettings') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                    Pengaturan Keamanan
                </a>
                <form action="{{ route('logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
