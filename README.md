<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Website News Portal

## Deskripsi Proyek

Proyek ini adalah sebuah aplikasi web yang dikembangkan sebagai bagian dari tugas akhir untuk mata kuliah Pemrograman Web. Aplikasi ini menyediakan platform blogging yang memungkinkan pengguna untuk membuat, mengedit, menghapus, dan melihat postingan blog. Selain itu, pengguna juga dapat mengelola kategori untuk mengelompokkan postingan.

## Fitur Utama

1. **Autentikasi Pengguna:**
   - Registrasi pengguna baru
   - Login dan logout
   - Mengelola sesi pengguna (pengelola dan admin)

2. **Manajemen Post:**
   - Membuat, mengedit, dan menghapus postingan blog
   - Postingan dapat memiliki status `publish` atau `draft`
   - Hanya postingan dengan status `publish` yang ditampilkan di frontend
   - Pengguna dapat melihat detail postingan beserta kategori, tanggal, penulis, dan jumlah hits (dilihat)

3. **Manajemen Kategori:**
   - Membuat, mengedit, dan menghapus kategori
   - Hanya kategori aktif yang dapat dipilih saat membuat atau mengedit postingan
   - Kategori yang tidak aktif tidak ditampilkan

4. **Navigasi dan Tampilan:**
   - Navbar dengan navigasi ke halaman utama, halaman postingan, kategori, about, dan contact
   - Sidebar untuk navigasi admin, termasuk dashboard, manajemen postingan, kategori, konfigurasi, dan pengguna
   - Tampilan postingan dengan gambar, judul, konten, kategori, penulis, dan jumlah hits

## Tampilan Aplikasi

### Halaman Utama
Halaman utama menampilkan daftar postingan terbaru yang berstatus `publish`. Pengguna dapat melakukan pencarian postingan berdasarkan keyword.
![Add Data Page](https://github.com/septiisdayanna/CRUD-PHP-PDO/blob/main/Tampilan%20CRUD/Tampilan%20Add%20Data.png)

### Halaman Detail Post
Setelah mengklik "Read More" pada salah satu postingan, pengguna akan diarahkan ke halaman detail post yang menampilkan gambar, judul, konten, kategori, penulis, tanggal, dan jumlah hits dari postingan tersebut.

### Halaman Kategori
Menampilkan daftar kategori beserta jumlah postingan dalam setiap kategori. Pengguna dapat memilih kategori untuk melihat postingan yang terkait dengan kategori tersebut.

### Halaman Admin
Admin dapat mengakses halaman dashboard untuk mengelola postingan, kategori, konfigurasi aplikasi, dan pengguna.

## Instalasi dan Penggunaan

1. Clone repositori ini:
   ```bash
   git clone https://github.com/septiisdayanna/UAS_PEMWEB.git
   ```
2. Masuk ke direktori proyek:
   ```bash
   cd UAS_PEMWEB
   ```
3. Install dependencies menggunakan Composer:
   ```bash
   composer install
   ```
4. Salin file `.env.example` menjadi `.env` dan konfigurasikan database Anda.
   ```bash
   cp .env.example .env
   ```
5. Generate application key:
   ```bash
   php artisan key:generate
   ```
6. Migrasi dan seed database:
   ```bash
   php artisan migrate --seed
   ```
7. Jalankan aplikasi:
   ```bash
   php artisan serve
   ```
8. Buka browser dan akses `http://localhost:8000` untuk melihat aplikasi.




