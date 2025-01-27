@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Reset Password</h1>
        @if (session('status'))
            <div class="mb-4 text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 border rounded" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Send Password Reset Link</button>
        </form>
    </div>
@endsection