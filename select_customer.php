<html>
<head>
	<title>Заказы</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
</head>
	<body>
	<h1>Покупатели</h1>
	<?php
		$host='localhost';
		$database='account';
		$user='root';
		$pswd='1';

		$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database) or die("Не могу подключиться к базе.");

		if (isset( $_POST['fio'] )) $fio = $_POST['fio'];
		if ( empty ($fio) ) echo '<h3>Введите ФИО покупателя</h3>';
			else {
				$sql = "INSERT INTO `customers` ( `fio` ) VALUES ( '$fio' )";
				$result = mysql_query($sql);
				echo '<h2>Покупатель добавлен</h2>';
			}

		$sql = 'SELECT * FROM `customers`';
		$result = mysql_query($sql);
		echo '<table><tr>
			  <td><p class = "header">№</p></td>
			  <td><p class = "header">ФИО</p></td>
			  <td></td>
			  </tr>';
		while ($row=mysql_fetch_array($result)) {
			echo '<tr>
			<td><p>'.$row['id'].'</p></td>
			<td><p>'.$row['fio'].'</p></td>
			<td><p><a href = "add_order.php?id_customer='.$row['id'].'">Выбрать</a></p></td>
			</tr>';
		};
		echo '<tr>
				  <td></td>
				  <td>
				  	<form method="post">
						<p><input type="text" size="50" name="fio"></p>
					</form>
				  </td>
				  <td><p>Добавить покупателя</a></p></td>
			  </tr>';
		echo '</table>';
		
	?>
	<br>
	<h2><a href = "index.php">Вернуться на главную</a></h2>
	</body>
</html>