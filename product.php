<?php

/**
 * 
 *   Карточка товара
 * 
 */
$header_config = [
	'title' => 'Каторчка товара',
	'style' => 'product.css'
];
include('parts/header.php');

$template = [
	'id' => '',
	'img_url' => '',
	'name' => '',
	'description' => '',
	'price' => ''
];

if (!empty($_GET['id'])) {

	$sql = "SELECT * FROM products WHERE id='{$_GET['id']}'";
	$result = mysqli_query($link, $sql);
	$template = mysqli_fetch_assoc($result);

	// d($template);
} else {
	header('Location: /catalog.php');
}
?>

<main class="main">
	<div class="product">
		<div class="product-img" style="background-image: url(<?= $template['img_url'] ?>);"></div>
		<div class="product-name"><?= $template['name'] ?></div>
		<div class="product-articul">Артикул: <?= $template['articul'] ?></div>
		<div class="product-price"><?= $template['price'] ?> руб.</div>
		<div class="product-description"><?= $template['description'] ?></div>
		<div class="product-size"> </div>

		<div class="product-btn" data-product-id=<?= $template['id'] ?>>Добавить в корзину</div>
	</div>
</main>


<?php
$footer_config = [
	'script' => 'product.js'
];
include('parts/footer.php');
?>