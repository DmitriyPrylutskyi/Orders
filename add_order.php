<html>
<head>
	<title>Заказ</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
</head>
	<body>
	<h1>Новый заказ</h1>
	<?php
		$host='localhost';
		$database='account';
		$user='root';
		$pswd='1';

		$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database) or die("Не могу подключиться к базе.");

		if (isset( $_POST['id_customer'] )) $id_customer = $_GET['id_customer'];
		if (isset( $_POST['id_good'] )) $id_good = $_GET['id_good'];
		if (isset( $_POST['date'] )) $date = $_POST['date'];
		if ( empty ($date) ) echo '<h3>Выберите дату</h3>';
			else {
					$sql = "INSERT INTO `orders` ( `date`, `id_customer` ) VALUES ( '$date', '$id_customer' )";
					$result = mysql_query($sql);
					$sql = 'SELECT MAX(`id`) FROM `orders`';
					$result = mysql_query($sql);
					$row = mysql_fetch_row($result);
					$id_order = $row[0];
					echo '<h3><a href = "select_goods.php?id_good='.$id_good.'&id_customer='.$id_customer.'&id_order='.$id_order.'">Выбрать товар для заказа</a></h3>';
				 }
	?>
	<div id="add_order">
		<form method="POST">
			<label>Дата<input type="date" size="10" name="date"></label>
			<input type="submit" name="submit2" value="Открыть заказ">
		</form>
	</div>
	<br><h2><a href = "index.php">Вернуться на главную</a></h2>
	</body>
</html>