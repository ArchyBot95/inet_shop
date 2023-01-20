<?php

/**
 * 
 *   Корзина
 * 
 */
$header_config = [
	'title' => 'Корзина',
	'style' => 'basket.css'
];
include('parts/header.php');

d($_SESSION['basket']);
?>
<main class="main">


	<div>Корзина</div>


</main>


<?php
$footer_config = [
	'script' => 'basket.js'
];
include('parts/footer.php');
?>