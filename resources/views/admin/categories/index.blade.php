@extends('layouts.app')

@section('content')
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <h1 class="text-2xl font-bold mb-6 text-center">Kategori</h1>

    <div class="mb-6 text-left">
        <a href="{{ route('admin.categories.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-md">Tambah Kategori</a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($categories as $category)
            <!-- Icon Block -->
            <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-neutral-700">
                <!-- Icon -->
                <div class="flex justify-center items-center size-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg mx-auto">
                    <svg class="shrink-0 size-7 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M14.31 8l5.74 9.94M9.69 8L3.95 17.94"></path>
                        <path d="M12 2v20"></path>
                    </svg>
                </div>
                <!-- End Icon -->

                <div class="mt-3">
                    <h3 class="text-sm sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                        {{ $category->name }}
                    </h3>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500 hover:underline text-sm">Hapus</button>
                    </form>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500 hover:underline text-sm">Ubah</a>
                </div>
            </div>
            <!-- End Icon Block -->
        @empty
            <div class="col-span-full text-center">
                <p class="text-gray-500">Tidak ada kategori ditemukan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
