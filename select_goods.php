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

		$id_customer = $_GET['id_customer'];
		$id_order = $_GET['id_order'];

		$sql = 'SELECT * FROM `goods`';
		$result = mysql_query($sql);

		echo '<table><tr>
			  <td><p class = "header">№</p></td>
			  <td><p class = "header">Наименование</p></td>
			  <td><p class = "header">Цена</p></td>
			  <td></td>
			  </tr>';
		while ($row=mysql_fetch_array($result)) {
			echo '<tr>
				  <td><p>'.$row['id'].'</p></td>
				  <td><p>'.$row['name'].'</p></td>
				  <td><p>'.$row['price'].'</p></td>
				  <td><p><a href = "add_field.php?id_good='.$row['id'].'&id_customer='.$id_customer.'&id_order='.$id_order.'">Выбрать товар</a></p></td></tr>';
		};
		echo '</table>';
		echo '<h3><a href = "add_good.php?id_customer='.$id_customer.'">Добавить товар</a></h3>';
	?>
	<br>
	<h2><a href = "index.php">Вернуться на главную</a></h2>
	</body>
</html>