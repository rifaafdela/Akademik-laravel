# Sistem Akademik

Aplikasi Laravel untuk mengelola data Mahasiswa dan Dosen dengan fitur CRUD lengkap dan validasi form.

## Fitur Utama

- Tambah, ubah, dan hapus data Mahasiswa
- Tambah, ubah, dan hapus data Dosen
- Validasi input form untuk menjaga data tetap benar
- Antarmuka responsif dengan Bootstrap

## Teknologi yang Digunakan

- Laravel 13
- PHP 8
- MySQL
- Bootstrap 5

## Cara Menjalankan

1. Pastikan semua dependensi sudah terpasang:
   ```bash
   composer install
   npm install
   npm run build
   ```
2. Salin file konfigurasi lingkungan:
   ```bash
   cp .env.example .env
   ```
3. Sesuaikan konfigurasi database di file `.env`
4. Jalankan migrasi dan seed (opsional):
   ```bash
   php artisan migrate
   php artisan db:seed
   ```
5. Jalankan server lokal:
   ```bash
   php artisan serve
   ```

Akses aplikasi melalui `http://127.0.0.1:8000`.

## Penulis

Rifa Afdela
