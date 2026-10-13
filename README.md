# Fashion Store — PHP + MySQL

Website toko baju online responsif dengan katalog, pencarian/filter, detail produk, keranjang berbasis session, checkout, dan pencatatan pesanan di MySQL.

## Persyaratan
- PHP 8.0+ dengan ekstensi PDO MySQL
- MySQL/MariaDB
- XAMPP atau Laragon
- Koneksi internet untuk Google Fonts dan gambar contoh Unsplash

## Cara menjalankan (Laragon)
1. Ekstrak folder `fashion-store` ke `C:\laragon\www\fashion-store` (untuk XAMPP: `C:\xampp\htdocs\fashion-store`).
2. Jalankan Apache dan MySQL.
3. Buka phpMyAdmin, pilih tab Import, impor `database/fashion_store.sql` (file ini membuat database dan tabel otomatis).
4. Periksa kredensial pada `config/db.php`: default host `127.0.0.1`, database `fashion_store`, user `root`, password kosong. Sesuaikan bila perlu.
5. Buka `http://localhost/fashion-store/` di browser.

## Struktur
- `index.php`: beranda
- `products.php`: katalog + pencarian dan filter
- `product.php`: detail produk
- `cart_action.php`: tambah/update/hapus item (POST + CSRF)
- `cart.php`: keranjang
- `checkout.php`: checkout dan transaksi stok/pesanan
- `success.php`: konfirmasi pesanan
- `config/`: koneksi database dan fungsi bersama
- `partials/`: header, footer, kartu produk
- `assets/`: CSS dan JavaScript
- `database/`: SQL skema dan data contoh

## Catatan
Ini proyek demo MVP. Belum memiliki akun pelanggan/admin, variasi ukuran/warna, ongkir, gateway pembayaran, atau integrasi ekspedisi. Untuk penggunaan produksi, tambahkan fitur tersebut, validasi tambahan, HTTPS, monitoring, dan alur pembayaran. Gambar contoh diambil dari URL eksternal dan dapat diganti dengan gambar produk milik toko.
