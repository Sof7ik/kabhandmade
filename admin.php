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
	<title>Админ</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style_customer.css">
	<link rel="stylesheet" type="text/css" href="style/style_admin.css">
</head>
<body>

	<?
	/*$_SESSION['login'] = $userLogin;
	$query = mysqli_query($link, "SELECT `name`, `surname`, `email`, `tel` FROM `users` WHERE `login` = '$userLogin';");

	if ($query) {
		echo "1";
	}
	$queryResult = mysqli_fetch_assoc($query);

	$name = $queryResult['name'];
	$surname = $queryResult['surname'];
	$email = $queryResult['email'];
	$tel = $queryResult['tel'];

	echo $name;*/
	?>

	<table border="1px solid black" cellpadding="10px" cellspacing="10px">

		<tr>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Почта</th>
			<th>Телефон</th>
		</tr>

		<?
			
			echo "
			<tr>
				<td><?echo $name?></td>
				<td><?echo $surname?></td>
				<td><?echo $email?></td>
				<td><?echo $tel?></td>
			</tr>
			"
		?>

	</table>

	<a href="customer.php" class="cart">Заказчик</a>

</body>
</html>