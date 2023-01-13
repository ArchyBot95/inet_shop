<?php

/**
 * 
 *   Главная страница
 * 
 */
$header_config = [
	'title' => 'Главная страница',
	'style' => 'index.css'
];
include('parts/header.php');
?>

<main class="main">

	<div class="slider">
		<h1>Новые поступления весны</h1>
		<p>Мы подготовили для Вас лучшие новинки сезона</p>
		<div class="slider-button">Посмотреть новинки</div>
	</div>
	<div class="banner">
		<div class="banner-item _1">
			<h4>Джинсовые куртки</h4>
			<h5 class="uppercase">new arrival</h5>
		</div>
		<div class="banner-item _2">
			<div class="banner-item-attention"></div>
			<p>Каждый сезон мы подгатавливаем для Вас исключительно лучшую модную одежду. Следи за нашими новинками</p>
		</div>
		<div class="banner-item _3"></div>
		<div class="banner-item _4">
			<div class="arrow">
				<h4>Элегантная обувь</h4>
			</div>
			<h5 class="uppercase">Ботинки, кросовки</h5>
		</div>
		<div class="banner-item _5">
			<h4>Джинсы</h4>
			<h5>от 3200 руб.</h5>
		</div>
		<div class="banner-item _6">
			<div class="banner-item-attention"></div>
			<p>Самые низкие цены в Москве. Нашли дешевле? Вернем разницу</p>
		</div>
		<div class="banner-item _7"></div>
		<div class="banner-item _8">
			<div class="arrow">
				<h4>Аксессуары</h4>
			</div>
		</div>
		<div class="banner-item _9">
			<h4>Спортивная одежда</h4>
			<h5>от 590 руб.</h5>
		</div>
		<div class="banner-item _10">
			<h4>Детская одежда</h4>
			<h5 class="uppercase">new arrival</h5>
		</div>
	</div>
	<div class="sing-up">
		<h2>Будь всегда в курсе выгодных предложений</h2>
		<p>Подписывайся и следи за новинками и выгодными предложениями.</p>
		<div>

		</div>
	</div>

</main>

<?php
$footer_config = [
	'script' => 'index.js'
];
include('parts/footer.php');
?>