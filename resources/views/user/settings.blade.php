@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Pengaturan Akun</h2>

        <form action="{{ route('user.updateSettings') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" class="w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Kata Sandi Baru</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded-md">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Perbarui Pengaturan</button>
        </form>
    </div>
@endsection
