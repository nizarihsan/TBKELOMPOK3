@extends('layouts.app')

@section('content')
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Ubah Item Lelang</h2>
      <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Perbarui detail item lelang di bawah ini.</p>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.items.update', $item->id) }}" method="POST" class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2">
      @csrf
      @method('PUT')
      <div>
        <label for="name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Nama Item*</label>
        <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" required>
      </div>
      <div>
        <label for="starting_price" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Harga Awal*</label>
        <input type="number" name="starting_price" id="starting_price" value="{{ old('starting_price', $item->starting_price) }}" min="0" step="0.01" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" required>
      </div>
      <div class="sm:col-span-2">
        <label for="description" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Deskripsi*</label>
        <textarea id="description" name="description" rows="6" class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" required>{{ old('description', $item->description) }}</textarea>
      </div>
      <div class="sm:col-span-2">
        <label for="status" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Status*</label>
        <select id="status" name="status" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" required>
          <option value="active" {{ old('status', $item->status) == 'active' ? 'selected' : '' }}>Aktif</option>
          <option value="inactive" {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
          <option value="sold" {{ old('status', $item->status) == 'sold' ? 'selected' : '' }}>Terjual</option>
        </select>
      </div>
      <div class="flex items-center justify-between sm:col-span-2">
        <button type="submit" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Simpan semua</button>
        <span class="text-sm text-gray-500">*Diperlukan</span>
      </div>
    </form>
  </div>
</div>
@endsection
