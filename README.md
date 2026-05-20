# Sistem Akademik

Aplikasi Laravel untuk mengelola data Mahasiswa dan Dosen dengan fitur CRUD lengkap, validasi form, dan tampilan responsif.

## Deskripsi

Sistem ini dibuat untuk memudahkan pengelolaan data akademik dasar, termasuk pendaftaran, pembaruan, dan penghapusan data mahasiswa serta dosen.

## Fitur

- CRUD Mahasiswa: tambah, edit, dan hapus data mahasiswa
- CRUD Dosen: tambah, edit, dan hapus data dosen
- Validasi form untuk menjaga data yang dimasukkan valid
- Tampilan frontend menggunakan Bootstrap 5
- Manajemen data yang sederhana dan mudah digunakan

## Teknologi

- Laravel 13
- PHP 8
- MySQL
- Bootstrap 5
- Vite

## Persiapan

1. Pastikan PHP, Composer, Node.js, dan npm sudah terpasang.
2. Salin file konfigurasi lingkungan:
   ```bash
   cp .env.example .env
   ```
3. Buka file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=username
   DB_PASSWORD=password
   ```

## Instalasi

Jalankan perintah berikut dari direktori proyek:

```bash
composer install
npm install
npm run build
```

## Migrasi dan Seed Database

Jika sudah siap, jalankan migrasi database dan seed data (opsional):

```bash
php artisan migrate
php artisan db:seed
```

## Menjalankan Aplikasi

Jalankan server lokal dengan:

```bash
php artisan serve
```

Kemudian buka browser dan akses:

`http://127.0.0.1:8000`

## Struktur Singkat Folder

- `app/Models` : model `Mahasiswa` dan `Dosen`
- `app/Http/Controllers` : controller untuk logika aplikasi
- `resources/views` : tampilan aplikasi
- `routes/web.php` : rute aplikasi

## Penulis

Rifa Afdela
