<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded p-6">
                <h2 class="text-xl font-bold mb-2">Total Pengguna</h2>
                <p class="text-3xl">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white shadow-md rounded p-6">
                <h2 class="text-xl font-bold mb-2">Total Suara</h2>
                <p class="text-3xl">{{ $totalVotes }}</p>
            </div>
        </div>
    </div>
@endsection
