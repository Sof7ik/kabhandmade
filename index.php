<?php
require_once ('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>KaB HandMade - перетяжка сидений мотоциклов</title>
	<meta charset="utf-8">
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="styles/style_index.css">
	<link rel="icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
	<div class="wrapper">

		<header>
			<nav>
				<a href="main.php" class="logo_a" style="margin-right: 15%"><img src="img/logos/logo.png" class="logo_img"></a>
				<a href="https://vk.com/kabhandmade" class="logo_a"><img src="img/logos/vk_icon handpained.png" class="logo_img"></a>
			</nav>
		</header>

	<div class="content">

		<form class="types" action="send.php" method="POST">

			<section class="motocycle_type_select">
	
				<h3 style="margin-bottom: 0.5%;">ВВЕДИТЕ НАЗВАНИЕ МОТОЦИКЛА СЮДА</h3>
				<input type="text" name="motocycle_type_select" class="input_motocycle_type_select" required="">

			</section>

			<section class="cover_and_color">

				<section class="seat_cover_type_select">

					<h2>ВЫБЕРИТЕ ТИП МАТЕРИАЛА</h2>

					<div class="seat_cover_type_select">

						<input type="radio" name="seat_cover_type" id="Anti_Skid" required="" value="AntiSkid" class="input_radio">	

						<label for="Anti_Skid" class="seat_cover_type_name">Anti-Skid</label>	
						
						<label for="Anti_Skid" class="seat_type"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>

					</div>

					<div class="seat_cover_type_select">

						<input type="radio" name="seat_cover_type" id="SuperGrip" required="" value="SuperGrip" class="input_radio">

						<label for="SuperGrip" class="seat_cover_type_name">ProGrip</label>
						
						<label for="SuperGrip" style="margin-bottom: 3.5%;" class="seat_type"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo" class="seat_type_logo"></label>					

					</div>

				</section>

				<section class="seat_color_select">

					<h2>ВЫБЕРИТЕ ЦВЕТ МАТЕРИАЛА</h2>

					<div class="seat_color_select">

						<div class="seat_color">
							<input type="radio" name="seat_color" id="yellow" required="" value="Жёлтый" class="input_radio">
							<label for="yellow" class="seat_color_name" style="color: yellow">Yellow</label>
							<label for="yellow" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
						</div>

						<div class="seat_color">
							<input type="radio" name="seat_color" id="black" required="" value="Чёрный" class="input_radio">
							<label for="yellow" class="seat_color_name" style="color: black">Black</label>
							<label for="black" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
						</div>

						<div class="seat_color">
							<input type="radio" name="seat_color" id="red" required="" value="Красный" class="input_radio">
							<label for="yellow" class="seat_color_name" style="color: red">Red</label>
							<label for="red" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
						</div>

						<div class="seat_color">
							<input type="radio" name="seat_color" id="green" required="" value="Зелёный" class="input_radio">
							<label for="yellow" class="seat_color_name" style="color: green">Green</label>
							<label for="green" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
						</div>

						<div class="seat_color">		
							<input type="radio" name="seat_color" id="white" required="" value="Белый" class="input_radio">
							<label for="yellow" class="seat_color_name" style="color: ">White</label>
							<label for="white" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
						</div>

					</div>

				</section>

			</section>

			<section class="submit">
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