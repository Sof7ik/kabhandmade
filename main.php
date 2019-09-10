<?php
require_once ('connection.php');
session_start();

$button = $_POST['button'];

$motorcycle_type_select = htmlentities(mysqli_real_escape_string($link, $_POST['motocycle_type_select'])); //Берем значение из селекта (хз, как оно так работет, но у Мишы работало, значит и у меня заработает. Миша aka HighTechnologiesHere)

$seat_cover_type = htmlentities(mysqli_real_escape_string($link, $_POST['seat_cover_type']));
$_SESSION['seat_cover_type'] = $_POST['seat_cover_type'];

$seat_color = htmlentities(mysqli_real_escape_string($link, $_POST['seat_color']));
$_SESSION['seat_color'] = $_POST['seat_color'];

if(isset($button)){

	$send = mysqli_query($link, 
		"INSERT INTO `seats` VALUES (NULL, 1, 
		'$motorcycle_type_select', 
		'$seat_cover_type',
		'$seat_color');
		"
	);
	hearder('Location: main.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>KaB HandMade - перетяжка сидений мотоциклов</title>
	<meta charset="utf-8">
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="styles/style.css">
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

		<form class="types" action="" method="POST">

			<section class="motocycle_type_select">

				<select name="motocycle_type_select">
					 <option value="KTM SX85 2001-2015">KTM SX85 2001-2015</option>
					 <option value="KTM SX125 2001-2015">KTM SX125 2001-2015</option>
					 <option value="KTM SX250F 2001-2015">KTM SX250F 2001-2015</option>
					 <option value="KTM SX450F 2001-2015">KTM SX450F 2001-2015</option>
					 <option value="Suzukui RM-Z250 2013">Suzukui RM-Z250 2013</option>
					 <option value="Suzukui RM-Z450 2017">Suzukui RM-Z450 2017</option>
					 <option value="Kawasaki KX250F 2017">Kawasaki KX250F 2017</option>
				</select>

				<input type="radio" name="seat_cover_type" id="Anti_Skid" required="" value="Anti_Skid" class="input_radio">
					<label for="Anti_Skid" class="seat_color">Anti-Skid</label>					
					<label for="Anti_Skid" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>
				<input type="radio" name="seat_cover_type" id="Pro_Grip" required="" value="ProGrip" class="input_radio">
					<label for="Pro_Grip" class="seat_color">ProGrip</label>
					<label for="Pro_Grip" style="margin-bottom: 3.5%;" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo" class="seat_type_logo"></label>

			</section>

			<section class="seat_color_select">

				<input type="radio" name="seat_color" id="yellow" required="" value="Жёлтый" class="under_hr" style="margin-top: 7%;">
					<label for="yellow" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>

				<input type="radio" name="seat_color" id="black" required="" value="Чёрный" class="input_radio">
					<label for="black" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>

				<input type="radio" name="seat_color" id="red" required="" value="Красный" class="input_radio">
					<label for="red" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>

				<input type="radio" name="seat_color" id="green" required="" value="Зелёный" class="input_radio">
					<label for="green" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>

				<input type="radio" name="seat_color" id="white" required="" value="Белый" class="input_radio">
					<label for="white" class="seat_color"><img src="https://sun9-6.userapi.com/c623900/v623900527/11485d/0aSs_aoR3H8.jpg" class="seat_type_logo"></label>

			</section>

			<input type="submit" name="button" value="Заказать">
		</form>

<textarea>
Мотоцикл - <? echo $motorcycle_type_select?>
Тип материала - <?echo $_SESSION['seat_cover_type']?>
Цвет материала - <?echo $_SESSION['seat_color']?>
</textarea>

	</div>

</div>
</body>
</html>