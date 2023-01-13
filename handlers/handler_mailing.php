<?php
include($_SERVER['DOCUMENT_ROOT'] . '/parts/header_conf.php');



if (isset($_GET['email'])) {
	// Запрос к базе данных
	$sql = "INSERT INTO mailinglist (id, email)
				VALUE (null, '{$_GET['email']}')";
	// Результат обращения
	$result =	 mysqli_query($link, $sql);
	if ($result) {
		echo 'Ура, форма отправлена!';
	} else {
		echo 'К сожалению, по техническим причинам не удалось отправить данные';
	}
}
