<?
require_once ('connection.php');	
session_start();

if (!isset($_SESSION['username'])) {
	echo '<meta http-equiv="refresh" content="0;index.php">'; //идем на главную страницу
	exit;
}

if ($_SESSION['role'] == 1) {
	echo '<meta http-equiv="refresh" content="0;customer.php">'; //идем на главную страницу
	exit;
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Админ - KaB HandMade</title>
	<meta charset="utf-8">
	<link rel="icon" href="favicon.ico">
	<!-- <link rel="stylesheet" type="text/css" href="styles/style_customer.css"> -->
	<link rel="stylesheet" type="text/css" href="style/style_cart.css">
</head>
<body>

	<?

	$selectOrders = mysqli_query($link, 
		"SELECT 
			`name`, 
			`surname`, 
			`tel`, 
			`email`, 
			`coverType`, 
			`coverColor`, 
			`antiSkidStripes`, 
			`antiSkidStripesType`, 
			`antiSkidStripesColor` 

			FROM `users`, `seats` 

			WHERE seats.id_user = users.id_user");
	?>

	<table border="1px solid black" cellpadding="10px" cellspacing="10px" class="tableResult">

		<tr>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Телефон</th>
			<th>Почта</th>
			<th>Тип покрытия</th>
			<th>Цвет покрытия</th>
			<th>Полоски есть/нет</th>
			<th>Тип полосок</th>
			<th>Цвет полосок</th>
		</tr>

		<?
			while ($selectOrdersResult = mysqli_fetch_assoc($selectOrders)) {
				$name = $selectOrdersResult['name'];
				$surname = $selectOrdersResult['surname'];
				$tel = $selectOrdersResult['tel'];
				$email = $selectOrdersResult['email'];
				$coverType = $selectOrdersResult['coverType'];
				$coverColor = $selectOrdersResult['coverColor'];
				$antiSkidStripes = $selectOrdersResult['antiSkidStripes'];
				$antiSkidStripesType = $selectOrdersResult['antiSkidStripesType'];
				$antiSkidStripesColor = $selectOrdersResult['antiSkidStripesColor'];
				echo "<tr>";
					echo "<td class='id'>$name</td>";
					echo "<td class='id'>$surname</td>";
					echo "<td class='id'>$tel</td>";
					echo "<td class='id'>$email</td>";
					echo"<td class='class2'>$coverType</td>";
					echo"<td class='class3'>$coverColor</td>";
					echo"<td class='class4'>$antiSkidStripes</td>";
					echo"<td class='class5'>$antiSkidStripesType</td>";
					echo"<td class='class6'>$antiSkidStripesColor</td>";
				echo "</tr>";
			}
			mysqli_free_result($selectOrders);
		?>

	</table>

	<a href="customer.php" class="cart">Заказчик</a>

</body>
</html>