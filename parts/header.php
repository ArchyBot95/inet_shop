<?php

/**
 * 
 *   Шапка сайта
 * 
 */

include('header_conf.php');

$category_id = 1;

if (!empty($_GET['category_id'])) {
	$category_id = (int) $_GET['category_id'];
}

$sql_category = "SELECT * FROM categories WHERE id='{$category_id}'";
$result = mysqli_query($link, $sql_category);

// echo '<pre>';
// echo print_r(mysqli_fetch_assoc($result));
// echo '</pre>';



$category1 = mysqli_fetch_assoc($result);


// echo $category1['name'];

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
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $header_config['title'] ?></title>

	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Rubik+Distressed&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="../styles/<?= $header_config['style'] ?>">
</head>

<body>
	<div class="wrapper">
		<header>
			<div class="header">
				<nav class="menu">
					<a href="/" class="logo"></a>
					<a href="/catalog.php?category_id=1">Женщинам</a>
					<a href="/catalog.php?category_id=2">Мужчинам</a>
					<a href="/catalog.php?category_id=3">Детям</a>
					<a href="/catalog.php?category_id=4">Новинки</a>
					<a href="/parts/about.php?category_id=5">О нас</a>
				</nav>
				<div class="buy">
					<div class="account-img"></div>
					<a href="/index.php">Войти</a>
					<div class="basket-img"></div>
					<a href="/basket.php">Корзина(0)</a>
				</div>
			</div>
			<hr class="line">

			<?php if (!empty($_GET['category_id']) && ($category_id != 5)) : ?>
				<nav class='breadcrumbs'>
					<a href='/' class='bredcrumb-item'>Главная</a>
					<a href='/catalog.php?category_id=<?= $category1['id'] ?>' class='bredcrumb-item active'><?= $category1['name'] ?></a>
				</nav>
			<?php elseif ($category_id == 5) : ?>
				<nav class='breadcrumbs'>
					<a href='/' class='bredcrumb-item'>Главная</a>
					<a href='/parts/about.php?category_id=<?= $category1['id'] ?>' class='bredcrumb-item active'><?= $category1['name'] ?></a>
				</nav>
			<?php elseif (!empty($_GET['id'])) : ?>
				<nav class='breadcrumbs'>
					<a href='/' class='bredcrumb-item'>Главная</a>
					<a href='/catalog.php?category_id=1' class='bredcrumb-item'><?= $category1['name'] ?></a>
					<a href='/product.php?id=<?= $template['id'] ?>' class='bredcrumb-item active'><?= $template['name'] ?></a>
				</nav>
			<?php endif; ?>



		</header>