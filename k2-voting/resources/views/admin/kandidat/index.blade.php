@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Kandidat List</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.kandidat.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah
            Kandidat</a>

        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Deskripsi</th>
                        <th class="py-2 px-4">Kategori</th>
                        <th class="py-2 px-4">Foto</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($kandidats as $kandidat)
                        <tr>
                            <td class="border px-4 py-2">{{ $kandidat->id }}</td>
                            <td class="border px-4 py-2">{{ $kandidat->name }}</td>
                            <td class="border px-4 py-2">{{ $kandidat->description }}</td>
                            <td class="border px-4 py-2">{{ $kandidat->kategori->name }}</td>
                            <td class="border px-4 py-2">
                                @if ($kandidat->photo)
                                    <img src="{{ Storage::url('public/images/' . $kandidat->photo) }}"
                                        alt="{{ $kandidat->name }}" class="w-16 h-16">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.kandidat.edit', $kandidat->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                <form action="{{ route('kandidat.destroy', $kandidat->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
