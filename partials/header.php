<?php require_once __DIR__ . '/../config/functions.php'; ?>
<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= e($pageTitle ?? 'Fashion Store') ?> | Fashion Store</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="announcement">
		Gratis ongkir untuk pembelian tertentu • Koleksi terbaru tersedia
	</div>

	<header class="site-header">
		<div class="container nav">
			<a class="brand" href="index.php">FASHION<span>STORE.</span></a>
			<nav aria-label="Navigasi utama">
				<a href="index.php">Beranda</a>
				<a href="products.php">Katalog</a>
				<a href="products.php?category=Pria">Pria</a>
				<a href="products.php?category=Wanita">Wanita</a>
			</nav>
			<a class="cart-link" href="cart.php">
				Keranjang <span class="count"><?= cart_count() ?></span>
			</a>
		</div>
	</header>

	<main>
