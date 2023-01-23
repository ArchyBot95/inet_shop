<?php
$salt = 'prowebers';
include('../parts/header_conf.php');

$is_auth = isset($_SESSION['is_auth']) && $_SESSION['is_auth'];

if (!$is_auth && (!isset($auth_page) || !$auth_page)) {
	header('Location: /admin/auth.php');
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Административная панель</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" aria-current="page" href="/">Главная сайта</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" aria-current="page" href="/admin">Главная админки</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/admin/products.php">Список товаров</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/admin/product_add.php">Добавить новый товар</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/admin/orders.php">Заказы</a>
			</li>
			<?php if ($is_auth) : ?>
				<li class="nav-item">
					<a class="nav-link" href="/admin/exit.php">Выход</a>
				</li>
			<?php endif ?>
		</ul>
		<br>
		<br>