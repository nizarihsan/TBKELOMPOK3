@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 mt-12">
        <h2 class="text-2xl font-bold mb-4">Kelola Barang Lelang</h2>

        <a href="{{ route('admin.items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Item Baru</a>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach($items as $item)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">{{ $item->name }}</h3>
                    <p>Status: {{ $item->status }}</p>
                    <a href="{{ route('admin.items.edit', $item->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
