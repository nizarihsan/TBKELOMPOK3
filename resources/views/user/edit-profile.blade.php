@extends('layouts.app')
@extends('user.layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 white ">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-black dark:text-black mb-4">Edit Profil</h2>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Kelola nama, email, kata sandi, dan pengaturan akun.
                    </p>
                </div>

 <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" value="{{ $user->name }}" required>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border rounded" value="{{ $user->email }}" required>
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Kata Sandi</label>
            <input type="password" name="password" id="password" class="w-full p-2 border rounded">
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Konfirmasi Kata Sandi</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border rounded">
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone" id="phone" class="w-full p-2 border rounded" value="{{ $user->phone }}" placeholder="+62xxxxxxxxxxx">
            @error('phone')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-gray-700">Alamat</label>
            <textarea name="address" id="address" class="w-full p-2 border rounded" rows="3">{{ $user->address }}</textarea>
            @error('address')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Profile Photo -->
        <div class="mb-4">
            <label for="photo" class="block text-gray-700">Foto Profil</label>
            <div class="flex items-center gap-4">
                <img src="{{ $user->photo_url }}" alt="Current Photo" class="w-16 h-16 rounded-full">
                <input type="file" name="photo" id="photo" class="block w-full text-sm text-gray-700 border rounded">
            </div>
            @error('photo')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Perbarui Profil</button>
    </form>
</div>
@endsection
