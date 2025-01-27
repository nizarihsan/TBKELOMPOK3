@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Register</h2>
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border rounded-md" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md">Register</button>
        </form>
    </div>
@endsection
