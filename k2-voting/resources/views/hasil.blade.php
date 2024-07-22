@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded p-6">
            <h1 class="text-2xl font-bold mb-6">Hasil Pemilihan</h1>

            <form method="GET" action="{{ route('hasil') }}" class="mb-4">
                <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                <select name="kategori_id" id="kategori_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $selectedKategoriId == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Lihat Hasil</button>
            </form>

            <div class="bg-white shadow-md rounded my-6 p-6">
                @if ($selectedKategori)
                    <h2 class="text-xl font-bold mb-4">{{ $selectedKategori->name }}</h2>
                    <!-- Results Chart -->
                    <canvas id="resultsChart"></canvas>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var ctx = document.getElementById('resultsChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: @json($selectedKategori->kandidats->pluck('name')),
                                    datasets: [{
                                        label: 'Votes',
                                        data: @json($selectedKategori->kandidats->pluck('pemilihans_count')),
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
            </div>
            <!-- Percentage Table -->
            <div class="mt-10 bg-white shadow-md rounded">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4">Kandidat</th>
                            <th class="py-2 px-4">Suara Masuk</th>
                            <th class="py-2 px-4">Persentase</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @php
                            $totalVotes = $selectedKategori->kandidats->sum('pemilihans_count');
                        @endphp
                        @foreach ($selectedKategori->kandidats as $kandidat)
                            @php
                                $voteCount = $kandidat->pemilihans_count;
                                $percentage = $totalVotes > 0 ? ($voteCount / $totalVotes) * 100 : 0;
                            @endphp
                            <tr>
                                <td class="border px-4 py-2">{{ $kandidat->name }}</td>
                                <td class="border px-4 py-2">{{ $voteCount }}</td>
                                <td class="border px-4 py-2">{{ number_format($percentage, 2) }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
@endsection
