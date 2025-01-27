@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Manage Users</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                    <p>Email: {{ $user->email }}</p>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
