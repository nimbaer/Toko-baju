
<?php

require 'config/functions.php';

// Hanya menerima request POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('cart.php');
}

// Validasi token CSRF
check_csrf();

// Mengambil action dan ID produk
$action = $_POST['action'] ?? '';

$id = filter_var(
    $_POST['id'] ?? null,
    FILTER_VALIDATE_INT
);

// Mengosongkan keranjang
if ($action === 'clear') {
    unset($_SESSION['cart']);
    redirect('cart.php');
}

// Validasi ID produk
if (!$id) {
    redirect('cart.php');
}

// Mengambil data stok produk
$stmt = $pdo->prepare(
    'SELECT id, stock FROM products WHERE id = ?'
);

$stmt->execute([$id]);

$p = $stmt->fetch();

if (!$p) {
    redirect('cart.php');
}

// Mengambil jumlah produk
$qty = filter_var(
    $_POST['quantity'] ?? 1,
    FILTER_VALIDATE_INT
);

$qty = $qty === false ? 1 : $qty;

// Menyiapkan session keranjang
$_SESSION['cart'] ??= [];


// ==========================================
// PROSES KERANJANG
// ==========================================

// Tambah produk
if ($action === 'add' && $qty > 0 && $p['stock'] > 0) {

    $_SESSION['cart'][$id] = min(
        (int) $p['stock'],
        ($_SESSION['cart'][$id] ?? 0) + $qty
    );

}

// Update jumlah produk
elseif ($action === 'update') {

    if ($qty <= 0) {

        unset($_SESSION['cart'][$id]);

    } else {

        $_SESSION['cart'][$id] = min(
            $qty,
            (int) $p['stock']
        );

    }

}

// Hapus satu produk
elseif ($action === 'remove') {

    unset($_SESSION['cart'][$id]);

}

// Kembali ke halaman keranjang
redirect('cart.php');