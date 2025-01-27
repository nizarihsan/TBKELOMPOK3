@extends('layouts.app')
@extends('user.layout.app')
@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Notifikasi</h2>

        @if($notifications->isEmpty())
            <p class="text-gray-500">Tidak ada notifikasi yang tersedia.</p>
        @else
            <ul class="bg-white p-6 rounded-lg shadow-lg">
                @foreach($notifications as $notification)
                    <li class="mb-4 border-b pb-4">
                        <p>{{ $notification->data['message'] }}</p>
                        <p class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
