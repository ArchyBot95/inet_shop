<?php

/**
 * 
 *   Шапка сайта
 * 
 */

include('header_conf.php');
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
					<a href="/index.php" class="logo"></a>
					<a href="/catalog.php">Женщинам</a>
					<a href="/catalog.php">Мужчинам</a>
					<a href="/catalog.php">Детям</a>
					<a href="/catalog.php">Новинки</a>
					<a href="/parts/about.php">О нас</a>
				</nav>
				<div class="buy">
					<div class="account-img"></div>
					<a href="/index.php">Войти</a>
					<div class="basket-img"></div>
					<a href="/basket.php">Корзина(0)</a>
				</div>
			</div>
			<hr class="line">
		</header>