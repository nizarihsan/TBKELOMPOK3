@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold">Buat Item Baru</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.items.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium">Nama Item</label>
                    <input type="text" name="name" id="name"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama item" required>
                </div>

                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium">Merek</label>
                    <input type="text" name="brand" id="brand"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                           value="{{ old('brand') }}"
                           placeholder="Merek produk" required>
                </div>

                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium">Harga</label>
                    <input type="number" name="price" id="price"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                           value="{{ old('price') }}"
                           placeholder="0.00" required>
                </div>

                <div class="w-full">
                    <label for="starting_price" class="block mb-2 text-sm font-medium">Harga Awal</label>
                    <input type="number" name="starting_price" id="starting_price"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                           value="{{ old('starting_price') }}"
                           placeholder="0.00" required>
                </div>

                <div class="w-full">
                    <label for="status" class="block mb-2 text-sm font-medium">Status</label>
                    <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                            required>
                        <option value="">Pilih status</option>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                        <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Terjual</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                    </select>
                </div>

                <div>
                    <label for="category" class="block mb-2 text-sm font-medium">Kategori</label>
                    <select id="category" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="">Pilih kategori</option>
                        @foreach($categories ?? [] as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="weight" class="block mb-2 text-sm font-medium">Berat (kg)</label>
                    <input type="number" name="weight" id="weight"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                           value="{{ old('weight') }}"
                           placeholder="0.00" step="0.01">
                </div>

                <div class="sm:col-span-2">
                    <label for="image" class="block mb-2 text-sm font-medium">Gambar Produk</label>
                    <input type="file" name="image" id="image"
                           accept="image/*"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium">Deskripsi</label>
                    <textarea id="description" name="description" rows="8"
                              class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                              placeholder="Deskripsi produk">{{ old('description') }}</textarea>
                </div>
            </div>

            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                Buat Produk
            </button>
        </form>
    </div>
</div>
@endsection
