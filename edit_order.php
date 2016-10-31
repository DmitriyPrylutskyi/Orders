<html>
<head>
	<title>Заказ</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
</head>
	<body>
	<h1>Редактирование заказа</h1>
	<?php
		$host='localhost';
		$database='account';
		$user='root';
		$pswd='1';

		$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database) or die("Не могу подключиться к базе.");

		$id_order = $_GET['id_order'];
		$id_customer = $_GET['id_customer'];
		$sum = $i = 0;

		$sql = "SELECT * FROM `fields`, `goods` WHERE fields.id_good = goods.id AND id_order = '$id_order'";
		$result = mysql_query($sql);

		echo '<table>
			  <tr>
			  <td><p class = "header">№</p></td>
			  <td><p class = "header">Наименование</p></td>
			  <td><p class = "header">Цена</p></td>
			  <td><p class = "header">Количество</p></td>
			  <td><p class = "header">Сумма</p></td>
			  <td></td>
			  </tr>';
		while ($row = mysql_fetch_array($result)) {
			$i++;
			echo '<tr>
				  <td><p>'.$i.'</p></td>
				  <td><p>'.$row['name'].'</p></td>
				  <td><p>'.$row['price'].'</p></td>
				  <td><p>'.$row['amount'].'</p></td>
				  <td><p>'.$row['price'] * $row['amount'].'</p></td>
				  <td><p><a href = "delete_field.php?id_good='.$row['id'].'&id_order='.$id_order.'">Удалить товар</a></p></td>
				  </tr>';
			$sum += $row['price'] * $row['amount'];
		};
		echo '<tr>
			  <td></td>
			  <td><p>Итого</p></td>
			  <td></td>
			  <td></td>
			  <td><p>'.$sum.'</p></td>
			  <td></td>
			  </tr>
			  </table>';
		echo '<br><h3><a href = "select_goods.php?id_customer='.$id_customer.'&id_order='.$id_order.'">Выбрать товар для заказа</a></h3>';
	?>
	<br><h2><a href = "index.php">Вернуться на главную</a></h2>
	</body>
</html>