<?php

/**
 * 
 * 	 Подключение к базе данных
 * 
 */

$link = mysqli_connect('localhost', 'root', '', 'inet_shop');
mysqli_set_charset($link, 'utf8');
