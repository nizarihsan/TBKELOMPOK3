@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Profile Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Profil</h2>
                <a href="{{ route('edit-profile') }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                    Edit Profil
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Information -->
                <div class="space-y-4">
                    <div class="bg-gray-50 p-4 rounded-md">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Nama</h3>
                        <p class="text-lg text-gray-900">{{ $user->name }}</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-md">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Email</h3>
                        <p class="text-lg text-gray-900">{{ $user->email }}</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-md">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Anggota Sejak</h3>
                        <p class="text-lg text-gray-900">{{ $user->created_at->format('F d, Y') }}</p>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="space-y-4">
                    <div class="bg-gray-50 p-4 rounded-md">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Nomor Telepon</h3>
                        <p class="text-lg text-gray-900">{{ $user->phone ?? 'Tidak diatur' }}</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-md">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Alamat</h3>
                        <p class="text-lg text-gray-900">{{ $user->address ?? 'Tidak diatur' }}</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-md">
                        <h3 class="text-sm font-medium text-gray-500 mb-1">Terakhir Diperbarui</h3>
                        <p class="text-lg text-gray-900">{{ $user->updated_at->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Actions -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold mb-4">Tindakan Akun</h3>
            <div class="space-y-3">
                <a href="{{ route('change-password') }}"
                   class="block w-full px-4 py-2 text-center bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                    Ubah Kata Sandi
                </a>

                <a href="{{ route('security-settings') }}"
                   class="block w-full px-4 py-2 text-center bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                    Pengaturan Keamanan
                </a>

                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit"
                            class="w-full px-4 py-2 text-center bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
