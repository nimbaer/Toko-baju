
<?php
require 'config/functions.php';

$pageTitle = 'Beranda';

// Mengambil 4 produk terbaru dari database
$products = $pdo->query(
    'SELECT * FROM products ORDER BY id DESC LIMIT 4'
)->fetchAll();

include 'partials/header.php';
?>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container hero-grid">

        <div class="hero-copy">
            <span class="eyebrow">
                NEW SEASON / EVERYDAY STYLE
            </span>

            <h1>
                Temukan gaya<br>
                <em>versi dirimu.</em>
            </h1>

            <p>
                Koleksi pakaian pilihan dengan desain timeless,
                nyaman, dan mudah dipadukan untuk setiap momen.
            </p>

            <a class="btn btn-dark" href="products.php">
                Belanja Sekarang →
            </a>
        </div>

        <div class="hero-photo">
            <img
                src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=1200"
                alt="Koleksi Fashion Store"
            >
        </div>

    </div>
</section>


<!-- KOLEKSI PRODUK -->
<section class="container section">

    <div class="section-head">
        <div>
            <span class="eyebrow">PILIHAN UNTUKMU</span>
            <h2>Koleksi Terbaru</h2>
        </div>

        <a href="products.php">
            Lihat Semua →
        </a>
    </div>

    <div class="product-grid">

        <?php foreach ($products as $product): ?>

            <?php include 'partials/card.php'; ?>

        <?php endforeach; ?>

    </div>

</section>


<!-- PROMO SECTION -->
<section class="container promo">

    <span class="eyebrow">
        YOUR DAILY ESSENTIALS
    </span>

    <h2>
        Simple looks. Big confidence.
    </h2>

    <p>
        Temukan outfit favoritmu hari ini.
    </p>

    <a class="btn btn-light" href="products.php">
        Jelajahi Katalog
    </a>

</section>

<?php include 'partials/footer.php'; ?>