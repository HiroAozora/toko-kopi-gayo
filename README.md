Nama : Iqbal Firzatullah</br>
NIM : 0702231030</br>
Matkul : Pemrograman Berbasis Web Lanjutan</br>

# Toko Kopi Gayo ☕

Sistem Informasi dan Katalog Digital untuk Toko Kopi Gayo. Dibangun menggunakan **Laravel 12** dan **Bootstrap 5**.

![Toko Kopi Gayo Banner](public/kopi.png)

## Fitur Utama

- **Katalog Publik**: Tampilan responsif dengan modal detail produk dan integrasi WhatsApp Order.
- **Manajemen Stok**: Admin panel untuk mengelola produk, kategori, dan mencatat barang masuk/keluar.
- **Statistik Dashboard**: Pantau total produk dan stok menipis secara real-time.
- **Product Seeder Cerdas**: Otomatis mengisi data dummy dan gambar produk untuk keperluan demo/testing.

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- MySQL

## Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda:

1. **Clone Repository**

    ```bash
    git clone https://github.com/IqbalFirzaTullah/toko-kopi-gayo.git
    cd toko-kopi-gayo
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.

    ```bash
    cp .env.example .env
    # Edit .env sesuaikan DB_DATABASE, DB_USERNAME, DB_PASSWORD
    ```

4. **Generate Key & Storage Link**

    ```bash
    php artisan key:generate
    php artisan storage:link
    ```

5. **Migrasi dan Seeding Data (PENTING)**
   Perintah ini akan membuat tabel, akun admin, dan data produk dummy beserta gambarnya.

    ```bash
    php artisan migrate:fresh --seed
    ```

    > **Catatan:** `ProductSeeder` akan otomatis menyalin gambar placeholder ke folder storage, sehingga tampilan katalog tidak akan rusak/kosong.

6. **Jalankan Server**
    ```bash
    php artisan serve
    ```
    Buka `http://127.0.0.1:8000` di browser Anda.

## Akun Login Admin

- **Email**: `admin@gayo.com`
- **Password**: `password`

## Struktur Project

- `app/Http/Controllers`: Logika backend (Product, Category, Stock, Auth).
- `resources/views`: Tampilan frontend (Blade Templates).
- `database/seeders`: Data awal untuk testing.
- `public`: Aset statis (CSS, JS, Images).

---
