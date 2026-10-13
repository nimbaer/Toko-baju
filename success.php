
<?php

// ==========================================
// 1. MEMANGGIL FUNCTIONS
// ==========================================

require 'config/functions.php';


// ==========================================
// 2. MEMERIKSA STATUS PESANAN
// ==========================================

// Jika tidak ada pesanan yang berhasil dibuat,
// arahkan pelanggan kembali ke halaman utama
if (empty($_SESSION['completed_order'])) {

    redirect('index.php');

}


// ==========================================
// 3. MENGAMBIL NOMOR PESANAN
// ==========================================

// Mengambil ID pesanan dari session
$id = (int) $_SESSION['completed_order'];

// Menghapus session agar halaman sukses
// tidak dapat ditampilkan ulang secara langsung
unset($_SESSION['completed_order']);


// ==========================================
// 4. PENGATURAN HALAMAN
// ==========================================

$pageTitle = 'Pesanan Berhasil';

include 'partials/header.php';

?>


<!-- ==========================================
     5. HALAMAN PESANAN BERHASIL
========================================== -->

<section class="container section">

    <div class="empty">

        <!-- ICON BERHASIL -->

        <div class="success-icon">
            ✓
        </div>


        <!-- JUDUL KONFIRMASI -->

        <h1>
            Pesanan berhasil dibuat!
        </h1>


        <!-- NOMOR PESANAN -->

        <p>
            Nomor pesanan:

            <strong>
                #<?= $id ?>
            </strong>
        </p>


        <!-- PESAN TERIMA KASIH -->

        <p>
            Terima kasih telah berbelanja di Fashion Store.
            Simpan nomor pesanan ini.
        </p>


        <!-- TOMBOL BELANJA LAGI -->

        <a
            class="btn btn-dark"
            href="products.php"
        >
            Belanja Lagi
        </a>

    </div>

</section>


<!-- ==========================================
     6. FOOTER
========================================== -->

<?php include 'partials/footer.php'; ?>