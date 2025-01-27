@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Riwayat Lelang</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Nama Barang</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Jumlah Tawaran</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bids as $bid)
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">
                                <a href="{{ route('auction.show', $bid->auctionItem->id) }}" class="text-blue-500 hover:underline">
                                    {{ $bid->auctionItem->name }}
                                </a>
                            </td>
                            <td class="px-4 py-2">Rp{{ number_format($bid->amount, 2) }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-2 py-1 text-xs font-semibold leading-tight {{ $bid->auctionItem->status == 'active' ? 'text-green-800 bg-green-200' : 'text-red-800 bg-red-200' }} rounded-full">
                                    {{ ucfirst($bid->auctionItem->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                @can('manage', $bid->auctionItem)
                                    <a href="{{ route('admin.manageItem', $bid->auctionItem->id) }}" class="text-blue-500 hover:underline">Kelola</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
