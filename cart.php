
<?php

// ==========================================
// 1. MEMANGGIL FUNCTIONS
// ==========================================

require 'config/functions.php';

// Judul halaman
$pageTitle = 'Keranjang';

// Mengambil produk dari session keranjang
$items = cart_products($pdo);

// Inisialisasi total belanja
$total = 0;

// Memanggil header
include 'partials/header.php';

?>


<!-- ==========================================
     2. HALAMAN KERANJANG BELANJA
========================================== -->

<section class="container section">

    <h1 class="page-title">
        Keranjang Belanja
    </h1>


    <!-- JIKA KERANJANG KOSONG -->

    <?php if (!$items): ?>

        <div class="empty">

            <h2>Keranjang masih kosong</h2>

            <p>
                Yuk temukan pakaian favoritmu.
            </p>

            <a class="btn btn-dark" href="products.php">
                Mulai Belanja
            </a>

        </div>


    <!-- JIKA KERANJANG BERISI PRODUK -->

    <?php else: ?>

        <div class="cart-layout">

            <!-- DAFTAR PRODUK -->

            <div>

                <?php foreach ($items as $item): ?>

                    <?php

                    // Menghitung subtotal setiap produk
                    $subtotal = $item['price'] * $item['quantity'];

                    // Menambahkan subtotal ke total belanja
                    $total += $subtotal;

                    ?>

                    <div class="cart-item">

                        <!-- GAMBAR PRODUK -->

                        <img
                            src="<?= e($item['image']) ?>"
                            alt="<?= e($item['name']) ?>"
                        >


                        <!-- INFORMASI PRODUK -->

                        <div class="cart-item-info">

                            <h3>
                                <?= e($item['name']) ?>
                            </h3>

                            <p>
                                <?= rupiah($item['price']) ?>
                            </p>


                            <!-- FORM UPDATE JUMLAH PRODUK -->

                            <form
                                method="post"
                                action="cart_action.php"
                                class="qty-form"
                            >

                                <input
                                    type="hidden"
                                    name="csrf"
                                    value="<?= e(csrf()) ?>"
                                >

                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= (int) $item['id'] ?>"
                                >

                                <input
                                    type="hidden"
                                    name="action"
                                    value="update"
                                >

                                <input
                                    type="number"
                                    name="quantity"
                                    min="0"
                                    max="<?= (int) $item['stock'] ?>"
                                    value="<?= (int) $item['quantity'] ?>"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-outline"
                                >
                                    Update
                                </button>

                            </form>


                            <!-- FORM HAPUS PRODUK -->

                            <form
                                method="post"
                                action="cart_action.php"
                            >

                                <input
                                    type="hidden"
                                    name="csrf"
                                    value="<?= e(csrf()) ?>"
                                >

                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= (int) $item['id'] ?>"
                                >

                                <input
                                    type="hidden"
                                    name="action"
                                    value="remove"
                                >

                                <button
                                    type="submit"
                                    class="text-button"
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>


                        <!-- SUBTOTAL PRODUK -->

                        <strong>
                            <?= rupiah($subtotal) ?>
                        </strong>

                    </div>

                <?php endforeach; ?>

            </div>


            <!-- ==========================================
                 3. RINGKASAN BELANJA
            ========================================== -->

            <aside class="summary">

                <h2>
                    Ringkasan Belanja
                </h2>

                <div class="summary-row">

                    <span>Subtotal</span>

                    <strong>
                        <?= rupiah($total) ?>
                    </strong>

                </div>

                <p class="muted">
                    Biaya pengiriman belum termasuk.
                </p>

                <a
                    class="btn btn-dark full"
                    href="checkout.php"
                >
                    Lanjut Checkout →
                </a>

            </aside>

        </div>

    <?php endif; ?>

</section>


<!-- ==========================================
     4. FOOTER
========================================== -->

<?php include 'partials/footer.php'; ?>