
<article class="product-card">

    <!-- GAMBAR PRODUK -->
    <a href="product.php?id=<?= (int) $product['id'] ?>">

        <div class="product-image">

            <img
                src="<?= e($product['image']) ?>"
                alt="<?= e($product['name']) ?>"
                loading="lazy"
            >

            <span class="chip">
                <?= e($product['category']) ?>
            </span>

        </div>

    </a>


    <!-- INFORMASI PRODUK -->
    <div class="product-info">

        <h3>
            <a href="product.php?id=<?= (int) $product['id'] ?>">
                <?= e($product['name']) ?>
            </a>
        </h3>

        <p>
            <?= rupiah($product['price']) ?>
        </p>


        <!-- TOMBOL TAMBAH KE KERANJANG -->
        <form method="post" action="cart_action.php">

            <input
                type="hidden"
                name="csrf"
                value="<?= e(csrf()) ?>"
            >

            <input
                type="hidden"
                name="action"
                value="add"
            >

            <input
                type="hidden"
                name="id"
                value="<?= (int) $product['id'] ?>"
            >

            <button
                type="submit"
                class="btn btn-dark"
                <?= ((int) $product['stock'] < 1) ? 'disabled' : '' ?>
            >
                <?= ((int) $product['stock'] < 1)
                    ? 'Stok Habis'
                    : '+ Keranjang'
                ?>
            </button>

        </form>

    </div>

</article>