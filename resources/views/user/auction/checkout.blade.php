@extends('user.layout.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Beli</h2>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold">Barang: {{ $item->name }}</h3>
            <p class="text-gray-600">Price: ${{ number_format($item->price, 2) }}</p>

            <form action="{{ route('payment.process', $item->id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="payment_method" class="block text-gray-700">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method" class="w-full p-2 border rounded-md">
                        <option value="credit_card">Kartu Kredit</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>

                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md">Konfirmasi Pembayaran</button>
            </form>
        </div>
    </div>
@endsection
