<html>
<head>
	<title>Заказы</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
</head>
	<body>
	<h1>Удаление заказа</h1>
	<?php
		$host='localhost';
		$database='account'; // имя базы данных, которую вы должны создать
		$user='root'; // заданное вами имя пользователя, либо определенное провайдером
		$pswd='1'; // заданный вами пароль

		$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database) or die("Не могу подключиться к базе.");

		$id_order = $_GET['id_order'];
		
		$sql = "DELETE FROM `orders` WHERE id = '$id_order'";
		$result = mysql_query($sql);
		$sql = "DELETE FROM `fields` WHERE id_order = '$id_order'";
		$result = mysql_query($sql);
		echo '<h2>Запись удалена</h2>';
	?>
	<br><h2><a href = "index.php">Вернуться на главную</a></h2>
	</body>
</html>