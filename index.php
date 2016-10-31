<html>
<head>
	<title>Заказы</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
</head>
	<body>
	<h1>Заказы</h1>
	<?php
		$host='localhost';
		$database='account';
		$user='root';
		$pswd='1';

		$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database) or die("Не могу подключиться к базе.");

		if (isset( $_POST['date_begin'] )) $date_begin = $_POST['date_begin'];
		if (isset( $_POST['date_end'] )) $date_end = $_POST['date_end'];
		
		if ( empty ($date_begin) or empty ($date_end) ) {
			echo '<h3>Выберите даты</h3>';
			$sql = 'SELECT * FROM `customers`, `orders` WHERE orders.id_customer = customers.id';
			$result = mysql_query($sql);
			}
			else {
				echo '<h1>c '.$date_begin.' по '.$date_end.'</h1>';
				$sql = "SELECT * FROM `customers`, `orders` WHERE orders.id_customer = customers.id AND (date>= '$date_begin' AND date<='$date_end')";
				$result = mysql_query($sql);
			}
		echo '<table>
			  <tr>
			  <td><p class = "header">№</p></td>
			  <td><p class = "header">Дата</p></td>
			  <td><p class = "header">Имя</p></td>
			  <td><p class = "header">Сумма</p></td>
			  <td></td>
			  <td></td>
			  </tr>';
		
		while ($row = mysql_fetch_array($result)) {
			echo '<tr>
			<td><p>'.$row['id'].'</p></td>
			<td><p>'.$row['date'].'</p></td>
			<td><p>'.$row['fio'].'</p></td>';
			
			$sql = "SELECT * FROM `fields`, `goods` WHERE fields.id_good = goods.id AND id_order = '$row[id]'";
			$result_total = mysql_query($sql);
			$sum = 0;
			
			while ($row_total = mysql_fetch_array($result_total)) {
				$sum += $row_total['price'] * $row_total['amount'];
			}
			
			echo '<td><p>'.$sum.'</p></td>
			<td><p><a href = "edit_order.php?id_order='.$row['id'].'&id_customer='.$row['id_customer'].'">Редактировать заказ</a></p></td>
			<td><p><a href = "delete_order.php?id_order='.$row['id'].'">Снять заказ</a></p></td>
			</tr>';
		};
		echo '</table><br>';
	?>
	<div id="select_order">
	  	<form method="post">
			<label>Дата начала <input type="date" size="10" name="date_begin"> </label>
			<label>Дата конца <input type="date" size="10" name="date_end"> </label>
			<br><br>
			<input type="submit" name="submit2" value="Отобрать">
		</form>
	</div>
	<h2><a href='select_customer.php'>Создать заказ</a></h2>
	</body>
</html>