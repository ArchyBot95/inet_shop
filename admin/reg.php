<?php
$auth_page = true;
// $required_auth = false;

include('parts/header.php');

$isset_required_fields = isset($_POST['email']) && isset($_POST['password']);
$not_empty_required_fields = !empty($_POST['email']) && !empty($_POST['password']);

if ($isset_required_fields && $not_empty_required_fields) {
	// Способ хеширования данных
	// echo hash('md5', $_POST['password']);
	$password = crypt($_POST['password'], $salt);


	$sql = "INSERT INTO users (id, first_name, last_name, email, password)
	VALUE (null, '{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '{$password}')";

	$result = mysqli_query($link, $sql);


	if ($result) {
		echo '<div class="alert alert-success" role="alert">
				Вы успешно зарегестрированы!
			</div>';
	} else {
		echo '<div class="alert alert-danger" role="alert">
				К сожалению, не удалось зарегистрироваться!
			</div>';
	}
}

?>

<h1>Регистрация нового пользователя</h1>

<form method="POST">
	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Имя" name="first_name">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Фамилия" name="last_name">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Почта" name="email">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Пароль" name="password">
	</div>

	<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>






<?php
include('parts/footer.php');
?>