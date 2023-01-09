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

	<div>Моя Главная страница</div>

</main>

<?php
$footer_config = [
	'script' => 'index.js'
];
include('parts/footer.php');
?>