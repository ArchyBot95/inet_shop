<?php

include('parts/header.php');

$sql_get_categories = "SELECT * FROM categories";
$result_get_categories = mysqli_query($link, $sql_get_categories);



// d($_POST);
// Сохраниение данных в базе
if (isset($_POST['add'])) {
	$sql_add = "INSERT INTO products (id, img_url, name, description, price)
	VALUE (null, '{$_POST['img_url']}', '{$_POST['name']}', '{$_POST['description']}', {$_POST['price']})";

	$result_add = mysqli_query($link, $sql_add);
	$id = mysqli_insert_id($link);

	if ($result_add) {
		echo '<div class="alert alert-success" role="alert">
				Ваши товар добавлен! (<a href="/admin/product_edit.php?id={$id}">Редактировать</a>)
			</div>';
	} else {
		echo '<div class="alert alert-danger" role="alert">
				Не удалось добавить товар!
			</div>';
	}
}


// $sql = "SELECT * FROM products WHERE id='{$_GET['id']}'";
// $result = mysqli_query($link, $sql);
// $data = mysqli_fetch_assoc($result);

// d($data);
?>

<h1>Добавление нового товара</h1>

<form method="POST">
	<input type="hidden" name="add" value="add">

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Путь до картинки" name="img_url">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Название" name="name">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Описание" name="description">
	</div>

	<div class="mb-3">
		<input type="text" class="form-control" placeholder="Цена" name="price">
	</div>

	<select class="form-select form-select-sm mb-3" placeholder="Категория" name="category">
		<?php while ($row = mysqli_fetch_assoc($result_get_categories)) : ?>
			<option value="<?= $row['id'] ?>"><?= $row['name']; ?></option>
		<?php endwhile; ?>
	</select>

	<button type="submit" class="btn btn-primary">Сохранить</button>
</form>

<?php
include('parts/footer.php');
?>