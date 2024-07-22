
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<sesuaikan databasenya>
    DB_USERNAME=root
    DB_PASSWORD=
    ```
6. Jalankan migrasi database dan seeder:

    ```bash
    php artisan migrate --seed
    ```

7. Buat kunci aplikasi:

    ```bash
    php artisan key:generate
    ```

8. Jalankan server lokal:

    ```bash
    php artisan serve
    npm run dev
    ```

9. Jika gambar tidak muncul run:

    ```bash
    php artisan storage:link
    ```

## Penggunaan

### Admin

1. **Login sebagai admin**:
   - Gunakan email dan kata sandi admin yang telah dibuat oleh seeder.

   email : admin@admin.com
   password : 123456

   email : admin2@admin.com
   password : 123456

2. **Manajemen Kandidat dan Kategori**:
   - Admin dapat menambah, mengedit, dan menghapus kandidat dan kategori melalui antarmuka admin.

3. **Melihat Riwayat Pemilihan**:
   - Admin dapat melihat riwayat pemilihan yang dilakukan oleh pengguna.

### Pengguna

1. **Registrasi dan Login**:
   - Pengguna baru harus melakukan registrasi sebelum dapat login dan memberikan suara.
   - Atau.
    email : user@user.com
    password : 123456

2. **Memberikan Suara**:
   - Setelah login, pengguna dapat memberikan suara dalam berbagai kategori.

3. **Melihat Hasil Pemilihan**:
   - Pengguna dapat melihat hasil pemilihan setelah memberikan suara.

## Strukur Direktori

- `app/Http/Controllers`: Direktori untuk controller.
- `app/Models`: Direktori untuk model.
- `database/migrations`: Direktori untuk migrasi database.
- `database/seeders`: Direktori untuk seeder database.
- `resources/views`: Direktori untuk view.
- `routes`: Direktori untuk rute aplikasi.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repositori ini dan buat pull request dengan perubahan Anda. Pastikan untuk menambahkan deskripsi yang jelas tentang perubahan yang Anda buat.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
