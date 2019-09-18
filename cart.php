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
$userRole = $_SESSION['role'];
$userId = $_SESSION['userId'];

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

		$count = mysqli_query($link, "SELECT * FROM `seats` WHERE (`id_user` = '$userId');");
		if ($count) {
			?>

			<table class="tableResult" cellpadding="10px" cellspacing="10px">
				<tr>
					<th>Номер заказа</th>
					<th>Мотоцикл</th>
					<th>Тип покрытия</th>
					<th>Цвет покрытия</th>
					<th>Полосы есть/нет</th>
					<th>Тип полос</th>
					<th>Цвет полос</th>
				</tr>
				<?
					/*while ($row_data = mysqli_fetch_row($count)) { Через mysqli_fetch_row
						echo "<tr>";
							echo"<td>$row_data[4]</th>";
							echo"<td>$row_data[5]</td>";
							echo"<td>$row_data[6]</td>";
							echo"<td>$row_data[7]</td>";
							echo"<td>$row_data[8]</td>";
							echo"<td>$row_data[9]</td>";
						echo "</tr>";
					}
					mysqli_free_result($count);*/

					while ($countResult = mysqli_fetch_assoc($count)) {
						$idSeat = $countResult['id_seat'];
						$moto = $countResult['moto'];
						$coverType = $countResult['coverType'];
						$coverColor = $countResult['coverColor'];
						$antiSkidStripes = $countResult['antiSkidStripes'];
						$antiSkidStripesType = $countResult['antiSkidStripesType'];
						$antiSkidStripesColor = $countResult['antiSkidStripesColor'];
						echo "<tr>";
							echo "<td class='id'>$idSeat</td>";
							echo"<td class='class1'>$moto</td>";
							echo"<td class='class2'>$coverType</td>";
							echo"<td class='class3'>$coverColor</td>";
							echo"<td class='class4'>$antiSkidStripes</td>";
							echo"<td class='class5'>$antiSkidStripesType</td>";
							echo"<td class='class6'>$antiSkidStripesColor</td>";
						echo "</tr>";
					}
					mysqli_free_result($count);
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