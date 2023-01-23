<?php

include('parts/header.php');

// Если не передан параметр id делаем редирект на страницу с товаром
if (!isset($_GET['id']) || isset($_GET['id']) && empty($_GET['id'])) {
	header('Location: /admin/products.php');
}

// d($_POST);
// Сохраниение данных в базе
if (isset($_POST['edit'])) {
	$sql_update = "UPDATE products SET
	img_url = '{$_POST['img_url']}',
	name = '{$_POST['name']}',
	description = '{$_POST['description']}',
	price = {$_POST['price']}
	WHERE id='{$_POST['id']}'";

	$result_update = mysqli_query($link, $sql_update);

	if ($result_update) {
		echo '<div class="alert alert-success" role="alert">
				Ваши изменения сохранены!
			</div>';
	} else {
		echo '<div class="alert alert-danger" role="alert">
				Не удалось сохранить изменени!
			</div>';
	}
}


$sql = "SELECT * FROM products WHERE id='{$_GET['id']}'";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);

// d($data);
?>

<h1>Редактирование товара "<?= $data['name'] ?>"</h1>

<form method="POST">
	<input type="hidden" name="edit" value="edit">
	<div class="mb-3">
		<input type="text" class="form-control" placeholder="ID" name="id" value="<?= $data['id'] ?>" readonly>
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Путь до картинки" name="img_url" value="<?= $data['img_url'] ?>">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Название" name="name" value="<?= $data['name'] ?>">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Описание" name="description" value="<?= $data['description'] ?>">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Цена" name="price" value="<?= $data['price'] ?>">
	</div>

	<button type="submit" class="btn btn-primary">Сохранить</button>
</form>








<?php
include('parts/footer.php');
?>