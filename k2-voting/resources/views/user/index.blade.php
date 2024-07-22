@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Cast Your Vote</h1>

        @foreach ($kategoris as $kategori)
            <div class="bg-white shadow-md rounded my-6 p-6">
                <h2 class="text-xl font-bold mb-4">{{ $kategori->name }}</h2>

                @if (isset($userPemilihans[$kategori->id]) && $userPemilihans[$kategori->id]->count() > 0)
                    <p class="text-green-500">Anda Sudah Memilih di Kategori ini</p>
                @else
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($kategori->kandidats as $kandidat)
                                <div class="bg-gray-100 rounded-lg shadow-lg p-4 flex flex-col items-center">
                                    @if ($kandidat->photo)
                                        <img src="{{ asset('storage/images/' . $kandidat->photo) }}"
                                            alt="{{ $kandidat->name }}" class="w-32 h-32 mb-4">
                                    @else
                                        <img src="https://via.placeholder.com/128" alt="No Image" class="w-32 h-32  mb-4">
                                    @endif
                                    <h3 class="text-lg font-semibold mb-2">{{ $kandidat->name }}</h3>
                                    <p class="text-gray-700 mb-4">{{ $kandidat->description }}</p>
                                    <div class="flex items-center">
                                        <input type="radio" name="kandidat_id" value="{{ $kandidat->id }}"
                                            id="kandidat-{{ $kandidat->id }}" class="mr-2">
                                        <label for="kandidat-{{ $kandidat->id }}" class="text-gray-700">Select</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Vote</button>
                    </form>
                @endif
            </div>
        @endforeach

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
    </div>
@endsection
