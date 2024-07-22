@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded p-6 mb-8">
            <h2 class="text-xl font-bold mb-4">Langkah-langkah Pemilihan</h2>
            <ol class="list-decimal list-inside space-y-2">
                <li>Masuk ke akun Anda dengan menggunakan email dan kata sandi yang telah terdaftar.</li>
                <li>Setelah masuk, Anda akan diarahkan ke halaman pemilihan.</li>
                <li>Pilih kategori yang ingin Anda lihat hasil pemilihannya dari dropdown yang tersedia.</li>
                <li>Untuk memberikan suara, pilih kandidat yang Anda dukung dari daftar kandidat yang tersedia di setiap
                    kategori.</li>
                <li>Pastikan Anda hanya memilih satu kandidat di setiap kategori. Anda tidak bisa mengubah pilihan setelah
                    suara dikirimkan.</li>
                <li>Setelah memilih kandidat, klik tombol "Pilih" untuk mengirimkan suara Anda.</li>
                <li>Anda akan menerima konfirmasi bahwa suara Anda telah berhasil dikirimkan.</li>
            </ol>
        </div>
    </div>
@endsection
