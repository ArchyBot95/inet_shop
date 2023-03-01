<?php

/**
 * 
 *   Каталог товаров
 * 
 */
$header_config = [
	'title' => 'Каталог товаров',
	'style' => 'catalog.css'
];
include('parts/header.php');

$category_id = 1;

if (!empty($_GET['category_id'])) {
	$category_id = (int) $_GET['category_id'];
}

$sql_category = "SELECT * FROM categories WHERE id='{$category_id}'";
$result = mysqli_query($link, $sql_category);

$category = mysqli_fetch_assoc($result);


// SELECT products.* FROM products INNER JOIN product_category ON products.id = product_category.product_id WHERE product_category.category_id = 1
?>


<div class="catalog" data-category-id="<?= $category['id'] ?>">
	<div class="catalog-header">
		<h1 class="catalog-title"><?= $category['name'] ?></h1>
		<div class="catalog-subtitle">Все товары</div>
	</div>

	<div class="sorting">
		<label>
			<div class="sorting-item sorting-catalog">Категория</div>
			<div class="container-catalog-item">
				<a href="/" class="sorting-catalog-item">Женщинам</a>
				<a href="/" class="sorting-catalog-item">Мужчинам</a>
				<a href="/" class="sorting-catalog-item">Детям</a>
				<a href="/" class="sorting-catalog-item">Новинки</a>
			</div>
		</label>
		<label>
			<div class="sorting-item sorting-size">Размер</div>
			<!-- <div class="sorting-item-size">
				<a class="sorting-catalog-item">Женщинам</a>
				<a class="sorting-catalog-item">Мужчинам</a>
				<a class="sorting-catalog-item">Детям</a>
				<a class="sorting-catalog-item">Новинки</a>
			</div> -->
		</label>
		<label>
			<div class="sorting-item sorting-price">Стоимость</div>
			<div class="sorting-item-price">
				<a class="sorting-catalog-item">Женщинам</a>
				<a class="sorting-catalog-item">Мужчинам</a>
				<a class="sorting-catalog-item">Детям</a>
				<a class="sorting-catalog-item">Новинки</a>
			</div>
		</label>
	</div>

	<div class="catalog-list">

	</div>

	<div class="pagination"></div>


	<div class="loader">Загрузка...</div>
</div>

<?php
$footer_config = [
	'script' => 'catalog.js'
];
include('parts/footer.php');
?>