@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold">Create New User</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                <!-- Name Input -->
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium">Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('name') }}"
                        placeholder="Enter full name"
                        required>
                    @error('name')
                        <span class="invalid-feedback text-red-500 text-sm mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="sm:col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('email') }}"
                        placeholder="Enter email address"
                        required>
                    @error('email')
                        <span class="invalid-feedback text-red-500 text-sm mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="sm:col-span-2">
                    <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Enter password"
                        required>
                    @error('password')
                        <span class="invalid-feedback text-red-500 text-sm mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Role Selection -->
                <div class="sm:col-span-2">
                    <label for="role" class="block mb-2 text-sm font-medium">Role</label>
                    <select
                        name="role"
                        id="role"
                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        required>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>

            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                Create User
            </button>
        </form>
    </div>
</div>
@endsection
