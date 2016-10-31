<html>
<head>
	<title>Заказы</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
</head>
	<body>
	<h1>Товары</h1>
	<?php
		$host='localhost';
		$database='account';
		$user='root';
		$pswd='1';

		$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database) or die("Не могу подключиться к базе.");

		if (isset( $_POST['name'] )) $name = $_POST['name'];
		if (isset( $_POST['price'] )) $price = $_POST['price'];
		$id_customer = $_GET['id_customer'];

		if ( empty ($name) ) echo '<h3>Введите название</h3>';
			else
				if ( empty ($price) or $price<=0 ) echo '<h3>Введите цену</h3>';
					else {
							$sql = "INSERT INTO `goods` ( `name`, `price` ) VALUES ( '$name', '$price' )";
							$result = mysql_query($sql);
							echo '<h2>Товар добавлен</h2>';
						 }
		echo '<br><h3><a href = "select_goods.php?id_customer='.$id_customer.'">Вернуться к выбору товара</a></h3>';
	?>
	<div id="add_good">
		<form method="post">
			<label>Название <input type="text" size="30" name="name"></label>
			<label>Цена <input type="text" size="10" name="price">   </label>
			<input type="submit" name="submit2" value="Добавить">
		</form>
	</div>
	<br><h2><a href = "index.php">Вернуться на главную</a></h2>
	</body>
</html>