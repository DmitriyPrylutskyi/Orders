<html>
<head>
	<title>Заказ</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
</head>
	<body>
	<h1>Заказ</h1>
	<?php
		$host='localhost';
		$database='account';
		$user='root';
		$pswd='1';

		$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database) or die("Не могу подключиться к базе.");

		$id_customer = $_GET['id_customer'];
		$id_order = $_GET['id_order'];
		$id_customer = $_GET['id_customer'];
		$id_good = $_GET['id_good'];
		if (isset( $_POST['amount'] )) $amount = $_POST['amount'];

		if ( empty ($amount) or $amount<=0 ) echo '<h3>Введите количество</h3>';
			else {
				$sql = "INSERT INTO `fields` ( `amount`, `id_good`, `id_order` ) VALUES ( '$amount', '$id_good', '$id_order' )";
				$result = mysql_query($sql);
				echo '<h2>Заказ добавлен</h2>';
			}

		$sql = "SELECT * FROM `fields`, `goods` WHERE fields.id_good = goods.id AND id_order = '$id_order'";
		$result = mysql_query($sql);
		echo '<table><tr>
			  <td><p class = "header">№</p></td>
			  <td><p class = "header">Наименование</p></td>
			  <td><p class = "header">Цена</p></td>
			  <td><p class = "header">Количество</p></td>
			  <td></td>
			  </tr>';
		while ($row = mysql_fetch_array($result)) {
			echo '<tr>
				  <td><p>'.$row['id'].'</p></td>
				  <td><p>'.$row['name'].'</p></td>
				  <td><p>'.$row['price'].'</p></td>
				  <td><p>'.$row['amount'].'</p></td>
				  <td></td>
				  </tr>';
		};
		$sql = "SELECT * FROM `goods` WHERE (`id` = '$id_good')";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		echo '<tr>
				  <td><p>'.$row[0].'</p></td>
				  <td><p>'.$row[1].'</p></td>
				  <td><p>'.$row[2].'</p></td>
				  <td>
				  	<form method="post">
						<p><input type="text" size="10" name="amount"></p>
					</form>
				  </td>
				  <td><p>Добавить товар</p></td>
			  </tr>';
		echo '</table>';
		echo '<h3><a href = "select_goods.php?id_customer='.$id_customer.'&id_order='.$id_order.'">Выбрать товар</a></h3>';
		echo '<h3><a href = "edit_order.php?id_customer='.$id_customer.'&id_order='.$id_order.'">Вернуться к редактированию заказа</a></h3>';
	?>
	<br><h2><a href = "index.php">Вернуться на главную</a></h2>
	</body>
</html>