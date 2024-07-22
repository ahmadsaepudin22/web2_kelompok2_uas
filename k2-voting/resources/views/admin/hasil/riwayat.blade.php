@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Riwayat Pemilihan</h1>

        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">User</th>
                        <th class="py-2 px-4">Kandidat</th>
                        <th class="py-2 px-4">Kategori</th>
                        <th class="py-2 px-4">Date</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($pemilihans as $pemilihan)
                        <tr>
                            <td class="border px-4 py-2">{{ $pemilihan->user->name }}</td>
                            <td class="border px-4 py-2">{{ $pemilihan->kandidat->name }}</td>
                            <td class="border px-4 py-2">{{ $pemilihan->kandidat->kategori->name }}</td>
                            <td class="border px-4 py-2">{{ $pemilihan->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
