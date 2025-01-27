@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Edit User</h2>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-4 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
        </form>
    </div>
@endsection
