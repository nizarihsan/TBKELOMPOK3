@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">{{ $category->name }}</h1>
        <p class="mt-2 text-gray-600">{{ $category->description }}</p>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Sidebar with filters -->
        <div class="lg:col-span-1">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Filter</h3>
                <form action="{{ route('admin.categories.show', $category->id) }}" method="GET">
                    <div class="space-y-4">
                        <!-- Price Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Rentang Harga</label>
                            <div class="mt-2 space-y-2">
                                <input type="number" name="min_price" placeholder="Harga Minimum"
                                    value="{{ request('min_price') }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <input type="number" name="max_price" placeholder="Harga Maksimum"
                                    value="{{ request('max_price') }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Semua</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="ended" {{ request('status') == 'ended' ? 'selected' : '' }}>Berakhir</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Items Grid -->
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                @forelse($items as $item)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-900">{{ $item->name }}</h3>
                            <p class="mt-1 text-gray-600">{{ Str::limit($item->description, 100) }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-indigo-600 font-medium">{{ number_format($item->current_price, 2) }}</span>
                                <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md text-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        Tidak ada item ditemukan dalam kategori ini.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $items->links() }}
            </div>
        </div>
    </div>

    <!-- Category Deletion Form -->
    <div class="mt-6">
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md text-sm">Hapus Kategori</button>
        </form>
    </div>
</div>
@endsection
