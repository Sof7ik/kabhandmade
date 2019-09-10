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

				<h3>ВЫБЕРИТЕ СВОЙ МОТОЦИКЛ</h3>

				<select name="motocycle_type_select">
					 <option value="KTM SX85 2001-2015">KTM SX85 2001-2015</option>
					 <option value="KTM SX125 2001-2015">KTM SX125 2001-2015</option>
					 <option value="KTM SX250F 2001-2015">KTM SX250F 2001-2015</option>
					 <option value="KTM SX450F 2001-2015">KTM SX450F 2001-2015</option>
					 <option value="Suzukui RM-Z250 2013">Suzukui RM-Z250 2013</option>
					 <option value="Suzukui RM-Z450 2017">Suzukui RM-Z450 2017</option>
					 <option value="Kawasaki KX250F 2017">Kawasaki KX250F 2017</option>
				</select>

				<h3 style="margin-top: 2%;">ЕСЛИ ВЫ НЕ НАШЛИ СВОЙ МОТОЦИКЛ В МЕНЮ, ВВЕДИТЕ ЕГО НАЗВАНИЕ СЮДА</h3>
				<input type="text" name="motocycle_type_select_one" class="input_motocycle_type_select">

			</section>

			<section class="seat_cover_type_select">

				<div class="seat_cover_type_select">

					<input type="radio" name="seat_cover_type" id="Anti_Skid" required="" value="AntiSkid" class="input_radio">
					
					<label for="Anti_Skid" class="seat_color">Anti-Skid</label>					
					
					<label for="Anti_Skid" class="seat_type"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>

				</div>

				<div class="seat_cover_type_select">

					<input type="radio" name="seat_cover_type" id="Pro_Grip" required="" value="SuperGrip" class="input_radio">
					
					<label for="Pro_Grip" class="seat_color">ProGrip</label>
					
					<label for="Pro_Grip" style="margin-bottom: 3.5%;" class="seat_type"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo" class="seat_type_logo"></label>

				</div>

			</section>

			<section class="seat_color_select">

				<div class="seat_color">
					<input type="radio" name="seat_color" id="yellow" required="" value="Жёлтый" class="input_radio">
					<label for="yellow" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
				</div>

				<div class="seat_color">
					<input type="radio" name="seat_color" id="black" required="" value="Чёрный" class="input_radio">
					<label for="black" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
				</div>

				<div class="seat_color">
					<input type="radio" name="seat_color" id="red" required="" value="Красный" class="input_radio">
					<label for="red" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
				</div>

				<div class="seat_color">
					<input type="radio" name="seat_color" id="green" required="" value="Зелёный" class="input_radio">
					<label for="green" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
				</div>

				<div class="seat_color">
					<input type="radio" name="seat_color" id="white" required="" value="Белый" class="input_radio">
					<label for="white" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
				</div>

			</section>

			<section class="submit">
				<input type="submit" name="button" value="Заказать">
			</section>
		</form>

	</div>

</div>
</body>
</html>