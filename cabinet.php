<?
require ('connection.php');
session_start();

if (!isset($_SESSION['username'])) {
	echo '<meta http-equiv="refresh" content="0;index.php">'; //идем на главную страницу
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Личный кабинет - KaB HandMade</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style_cart.css">
</head>
<body>

<div class="login">
	
	<?
		echo "<p class='name'>Вы вошли как <a href='cabinet.php'>" . $_SESSION['username'] . "</a></p>";
		echo "Фамилия - " . $_SESSION['surname'];
		echo "<br>";
		echo "ID роли - " . $_SESSION['role'];
		echo "<br>";
		echo "Имя роль - " . $_SESSION['roleName'];
		echo "<br>";
		echo "ID User - " . $_SESSION['userId'];
		echo "<br>";
		echo "Login - " . $_SESSION['login'];
	?>

	<div style="display: flex; flex-flow: row wrap; justify-content: center">

		<?
		if ($_SESSION['role'] == 2) {
			echo '<a href="admin.php" class="cart">Админ</a>';//идем на страницу админа
			
		}
		?>

		<a href="customer.php" class="cart">ГЛАВНАЯ</a>
		<a href="logout.php" class="cart">ВЫХОД</a>

	</div>

</div>

</body>
</html>

