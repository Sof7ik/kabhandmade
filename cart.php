<?
require ('connection.php');
session_start();

if (!isset($_SESSION['username'])) {
	echo '<meta http-equiv="refresh" content="0;index.php">'; //идем на главную страницу
	exit;
}

$userName = $_SESSION['username'];
$userSurname = $_SESSION['surname'];
$userLogin = $_SESSION['login'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Корзина</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style_cart.css">
</head>
<body>

<header>

	<nav>
		<a href="customer.php" class="logo_a" style="margin-right: 15%"><img src="img/logos/logo.png" class="logo_img"></a>
		<a href="https://vk.com/kabhandmade" class="logo_a"><img src="img/logos/vk_icon.png" class="logo_img"></a>
	</nav>

	<nav>
		<a href="galery.php" class="cart" style="text-shadow: #B389D8 0 0 10px;">ГАЛЕРЕЯ ЦВЕТОВ, МАТЕРИАЛОВ</a>
	</nav>

	<div class="login">
		
		<?
			echo "<p class='name'>Вы вошли как <a href='cabinet.php'>" . $_SESSION['username'] . "</a></p>";
			echo "Фамилия - " . $_SESSION['surname'];
			echo "<br>";
			echo "Роль - " . $_SESSION['role'];
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

</header>

<div class="content">

	<?

		$count = mysqli_query($link, "SELECT * FROM `seats` WHERE (`name` = '$userName' && `surname` = '$userSurname');");				

		$countResult = mysqli_fetch_assoc($count);

		$userName = $countResult['name'];
		$userSurname = $countResult['surname'];
		$moto = $countResult['moto'];
		$coverType = $countResult['coverType'];
		$coverColor = $countResult['coverColor'];
		$antiSkidStripes = $countResult['antiSkidStripes'];
		$antiSkidStripesType = $countResult['antiSkidStripesType'];
		$antiSkidStripesColor = $countResult['antiSkidStripesColor'];


		$numRowsFromCount = mysqli_num_rows($count); //считаем количество строк
		if ($numRowsFromCount > 0) {
			?>

			<table class="tableResult" border="2px solid black" cellpadding="10px" cellspacing="10px" style="margin: unset; padding: unset">
				<tr>
					<th>Мотоцикл</th>
					<th>Тип покрытия</th>
					<th>Цвет покрытия</th>
					<th>Полосы есть/нет</th>
					<th>Тип полос</th>
					<th>Цвет полос</th>
					<!-- 
					<th>Заголовок</th>
					<th>Заголовок</th>
					<th>Заголовок</th>
					<th>Заголовок</th>
					<th>Заголовок</th>
					<th>Заголовок</th> 
					-->
				</tr>
				<?
					for ($i = 0; $i < $count; $i++) {
						echo "<tr>";
							echo"<td>$moto</th>";
							echo"<td>$coverType</td>";
							echo"<td>$coverColor</td>";
							echo"<td>$antiSkidStripes</td>";
							echo"<td>$antiSkidStripesType</td>";
							echo"<td>$antiSkidStripesColor</td>";
						echo "</tr>";
					}
				?>	
			</table>

			<?
		}
		else if ($numRowsFromCount <= 0) {
			echo "<p class='fail'>Вы еще не делали заказов!</p>";
		}
		
?>

</div>

</body>
</html>