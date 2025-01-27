@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Reset Password</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" value="{{ $email ?? old('email') }}" required>
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Reset Password</button>
        </form>
    </div>
@endsection