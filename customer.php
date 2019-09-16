<?php
require_once ('connection.php');
session_start();

if (!isset($_SESSION['username'])) {
	echo '<meta http-equiv="refresh" content="0;index.php">'; //идем на главную страницу
	exit;
}

/*if ($_SESSION['role'] == 2) {
	echo '<meta http-equiv="refresh" content="0;admin.php">';//идем на страницу админа
	exit;
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>KaB HandMade - перетяжка сидений мотоциклов</title>
	<meta charset="utf-8">
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="styles/style_customer.css">
	<link rel="icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
	<div class="wrapper">

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
					/*$query1 = "SELECT 'role_name' FROM `roles` WHERE `id_role` = $_SESSION['role'];";
					$query = mysqli_query($link, $query1);
					$result = mysqli_fetch_assoc($query);*/
					echo "<p class='name'>Вы вошли как <span>" . $_SESSION['username'] . "</span></p>";
					echo "Фамилия - " . $_SESSION['surname'];
					echo "<br>";
					echo "Роль - " . $_SESSION['role'];
					echo "<br>";
					echo "ID User - " . $_SESSION['userId'];
					echo "<br>";
					echo "Login - " . $_SESSION['login'];
					/*echo "<p>Роль " . $_SESSION['role'] . "</p>";*/
				?>

				<div style="display: flex; flex-flow: row wrap; justify-content: center">

					<?
					if ($_SESSION['role'] == 2) {
						echo '<a href="admin.php" class="cart">Админ</a>';//идем на страницу админа
						
					}
					?>

					<a href="cart.php" class="cart">Корзина</a>
					<a href="logout.php" class="cart">ВЫХОД</a>

				</div>

			</div>

		</header>

	<div class="content">

		<form class="types" action="send.php" method="POST">

			<section class="motocycle_type_select">
	
				<h3 style="margin-bottom: 0.5%;">ВВЕДИТЕ НАЗВАНИЕ МОТОЦИКЛА СЮДА</h3>
				<input type="text" name="motocycle_type_select" class="input_motocycle_type_select" required="">

			</section>

			<section class="cover_and_color">

				<section class="seat_cover_type_select">

					<h3>ВЫБЕРИТЕ ТИП МАТЕРИАЛА</h3>

					<div class="seat_cover_type_select_wrapper">

						<div class="seat_cover_type_select">

							<input type="radio" name="seat_cover_type" id="Anti_Skid" required="" value="AntiSkid" class="input_radio">	

							<label for="Anti_Skid" class="seat_cover_type_name">Anti-Skid</label>	
							
							<label for="Anti_Skid" class="seat_type"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_cover_type_logo"></label>

						</div>

						<div class="seat_cover_type_select">

							<input type="radio" name="seat_cover_type" id="SuperGrip" required="" value="SuperGrip" class="input_radio">

							<label for="SuperGrip" class="seat_cover_type_name">ProGrip</label>
							
							<label for="SuperGrip" style="margin-bottom: 3.5%;" class="seat_type"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_cover_type_logo"></label>					

						</div>

					</div>	

				</section>

				<section class="seat_color_select">

					<h3>ВЫБЕРИТЕ ЦВЕТ МАТЕРИАЛА</h3>

					<div class="seat_color_select">

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="seat_cover_color" id="yellow" required="" value="Жёлтый" class="input_radio">
							<label for="yellow" class="seat_color_name" style="color: yellow">Yellow</label>
							<label for="yellow" class="seat_color"><img src="img/seat_color/seat_cover_color/Жёлтый.jpg" class="seat_cover_color_logo"></label>
						</div>

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="seat_cover_color" id="black" required="" value="Чёрный" class="input_radio">
							<label for="black" class="seat_color_name" style="color: black">Black</label>
							<label for="black" class="seat_color"><img src="img/seat_color/seat_cover_color/Чёрный.jpg" class="seat_cover_color_logo"></label>
						</div>

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="seat_cover_color" id="red" required="" value="Красный" class="input_radio">
							<label for="red" class="seat_color_name" style="color: red">Red</label>
							<label for="red" class="seat_color"><img src="img/seat_color/seat_cover_color/Красный.jpg" class="seat_cover_color_logo"></label>
						</div>

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="seat_cover_color" id="green" required="" value="Зелёный" class="input_radio">
							<label for="green" class="seat_color_name" style="color: green">Green</label>
							<label for="green" class="seat_color"><img src="img/seat_color/seat_cover_color/Зелёный.jpg" class="seat_cover_color_logo"></label>
						</div>

						<div class="seat_color">		
							<input type="radio" name="seat_cover_color" id="white" required="" value="Белый" class="input_radio">
							<label for="white" class="seat_color_name" style="color: white">White</label>
							<label for="white" class="seat_color"><img src="img/seat_color/seat_cover_color/Белый.jpg" class="seat_cover_color_logo"></label>
						</div>

					</div>

				</section>

			</section>

			<h2 style="color: white; margin: 10px 0;"><span style="">ВЫБЕРИТЕ НАЛИЧИЕ, ТИП И ЦВЕТ</span> <span>АНТИСКОЛЬЗЯЩИХ ПОЛОС</span></h2>

			<section class="anti_skid_stripes">

				<section class="anti_skid_stripes_yes_or_no">

					<h3>ВЫБЕРИТЕ НАЛИЧИЕ АНТИСКОЛЬЗЯЩИХ ПОЛОС</h3>

					<div class="anti_skid_stripes_yes_or_no">

						<input type="radio" name="anti_skid_stripes_yes_or_no" id="anti_skid_stripe_yes" required="" value="Есть" class="input_radio" 
						onclick="
						document.getElementById('anti_skid_stripe_сloth').required='yes', 
						document.getElementById('anti_skid_stripe_PVC1').required='yes',
						document.getElementById('anti_skid_stripe_PVC2').required='yes',
						document.getElementById('anti_skid_stripe_PVC3').required='yes',
						document.getElementById('anti_skid_stripe_blue').required='yes',
						document.getElementById('anti_skid_stripe_red').required='yes',
						document.getElementById('anti_skid_stripe_yellow').required='yes',
						document.getElementById('anti_skid_stripe_black').required='yes',
						document.getElementById('anti_skid_stripe_orange').required='yes',
						document.getElementById('anti_skid_stripe_green').required='yes',
						document.getElementById('anti_skid_stripe_white').required='yes',
						">

						<label for="anti_skid_stripe_yes" class="anti_skid_stripes_yes_or_no">Есть</label>	
						
						<label for="anti_skid_stripe_yes"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_cover_type_logo"></label>

					</div>

					<div class="anti_skid_stripes_yes_or_no">

						<input type="radio" name="anti_skid_stripes_yes_or_no" id="anti_skid_stripe_no" required="" value="Нет" class="input_radio">

						<label for="anti_skid_stripe_no" class="seat_cover_type_name">Нет</label>
						
						<label for="anti_skid_stripe_no" style="margin-bottom: 3.5%;"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_cover_type_logo"></label>					

					</div>

				</section>

				<section class="anti_skid_stripes_type">

					<h3>ВЫБЕРИТЕ ТИП АНТИСКОЛЬЗЯЩИХ ПОЛОС</h3>

					<div class="anti_skid_stripes_type">

						<div class="seat_color">
							<input type="radio" name="anti_skid_stripe_type" id="anti_skid_stripe_сloth" value="Матерчатые" class="input_radio">
							<label for="anti_skid_stripe_сloth" class="anti_skid_stripe_type">Матерчатые</label>
							<label for="anti_skid_stripe_сloth" class="seat_color"><img src="img\anti_skid_stripe\cloth\cloth_colors\green.png" class="anti_skid_stripe_type_logo" style="width: 200px;"></label>
						</div>

						<div class="seat_color">
							<input type="radio" name="anti_skid_stripe_type" id="anti_skid_stripe_PVC1" value="ПВХ галочка" class="input_radio">
							<label for="anti_skid_stripe_PVC1" class="anti_skid_stripe_type">ПВХ галочка</label>
							<label for="anti_skid_stripe_PVC1" class="seat_color"><img src="img\anti_skid_stripe\PVC1\PVC1_colors\white.png" class="anti_skid_stripe_type_logo"></label>
						</div>

						<div class="seat_color">
							<input type="radio" name="anti_skid_stripe_type" id="anti_skid_stripe_PVC2" value="ПВХ Закруглённый" class="input_radio">
							<label for="anti_skid_stripe_PVC2" class="anti_skid_stripe_type">ПВХ Закруглённый</label>
							<label for="anti_skid_stripe_PVC2" class="seat_color"><img src="img\anti_skid_stripe\PVC2\PVC2_colors\white.png" class="anti_skid_stripe_type_logo"></label>
						</div>

						<div class="seat_color">
							<input type="radio" name="anti_skid_stripe_type" id="anti_skid_stripe_PVC3" value="ПВХ Ромб" class="input_radio">
							<label for="anti_skid_stripe_PVC3" class="anti_skid_stripe_type">ПВХ Ромб</label>
							<label for="anti_skid_stripe_PVC3" class="seat_color"><img src="img\anti_skid_stripe\PVC3\PVC3_colors\white.png" class="anti_skid_stripe_type_logo"></label>
						</div>

					</div>

				</section>

				<section class="anti_skid_stripes_color_select">

					<h3>ВЫБЕРИТЕ ЦВЕТ АНТИСКОЛЬЗЯЩИХ ПОЛОС</h3>

					<div class="anti_skid_stripes_color_select">

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="anti_skid_stripe_color" id="anti_skid_stripe_blue" value="Синий" class="input_radio">
							<label for="anti_skid_stripe_blue" class="anti_skid_stripe_color" style="color: #021536">Blue</label>
							<label for="anti_skid_stripe_blue" class="seat_color"><img src="img/seat_color/seat_cover_color/Синий.jpg" class="anti_skid_stripe_color_logo"></label>
						</div>

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="anti_skid_stripe_color" id="anti_skid_stripe_red" value="Красный" class="input_radio">
							<label for="anti_skid_stripe_red" class="anti_skid_stripe_color" style="color: red">Red</label>
							<label for="anti_skid_stripe_red" class="seat_color"><img src="img/seat_color/seat_cover_color/Красный.jpg" class="anti_skid_stripe_color_logo"></label>
						</div>

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="anti_skid_stripe_color" id="anti_skid_stripe_yellow" value="Жёлтый" class="input_radio">
							<label for="anti_skid_stripe_yellow" class="anti_skid_stripe_color" style="color: yellow">Yellow</label>
							<label for="anti_skid_stripe_yellow" class="seat_color"><img src="img/seat_color/seat_cover_color/Жёлтый.jpg" class="anti_skid_stripe_color_logo"></label>
						</div>

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="anti_skid_stripe_color" id="anti_skid_stripe_black" value="Чёрный" class="input_radio">
							<label for="anti_skid_stripe_black" class="anti_skid_stripe_color" style="color: black">Black</label>
							<label for="anti_skid_stripe_black" class="seat_color"><img src="img/seat_color/seat_cover_color/Чёрный.jpg" class="anti_skid_stripe_color_logo"></label>
						</div>

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="anti_skid_stripe_color" id="anti_skid_stripe_orange" value="Оранжевый" class="input_radio">
							<label for="anti_skid_stripe_orange" class="anti_skid_stripe_color" style="color: #eb4b27">Orange</label>
							<label for="anti_skid_stripe_orange" class="seat_color"><img src="img/seat_color/seat_cover_color/Оранжевый.jpg" class="anti_skid_stripe_color_logo"></label>
						</div>			

						<div class="seat_color" style="margin-right: 3%;">
							<input type="radio" name="anti_skid_stripe_color" id="anti_skid_stripe_green" value="Зелёный" class="input_radio">
							<label for="anti_skid_stripe_green" class="anti_skid_stripe_color" style="color: green">Green</label>
							<label for="anti_skid_stripe_green" class="seat_color"><img src="img/seat_color/seat_cover_color/Зелёный.jpg" class="anti_skid_stripe_color_logo"></label>
						</div>

						<div class="seat_color">		
							<input type="radio" name="anti_skid_stripe_color" id="anti_skid_stripe_white" value="Белый" class="input_radio">
							<label for="anti_skid_stripe_white" class="anti_skid_stripe_color" style="color: white">White</label>
							<label for="anti_skid_stripe_white" class="seat_color"><img src="img/seat_color/seat_cover_color/Белый.jpg" class="anti_skid_stripe_color_logo"></label>
						</div>

					</div>

				</section>

			</section>


			<section class="submit">

				<div class="submit">

					<input type="checkbox" required="" class="checkbox">
					<p>Согласен с <a href="send.php" class="nothing">условиями заказа</a>, а так же подтверждаю <span style="font-weight: bold; color: #E8FF03">правильность</span> выбора</p>

				</div>

				<input type="submit" name="button" value="Заказать">
			</section>

			<?
			/*$_SESSION['motocycle_type_select'] = $_POST['motocycle_type_select'];
			$_SESSION['seat_cover_type'] = $_POST['seat_cover_type'];
			$_SESSION['seat_color'] = $_POST['seat_color'];*/
			?>
		</form>

	</div>

</div>
</body>
</html>