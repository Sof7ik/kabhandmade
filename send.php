<?php
require_once ('connection.php');
session_start();

/*if (!isset($_SESSION['seat_cover_type'])) {
	header('Location: index.php');
}*/

/*$value = $_POST['motocycle_type_select'];*/
$_SESSION['motocycle_type_select'] = $_POST['motocycle_type_select'];
$value = $_SESSION['motocycle_type_select'];
//Берем значение из селекта (хз, как оно так работет, но у Мишы работало, значит и у меня заработает. Миша aka HighTechnologiesHere)

$seat_cover_type = $_POST['seat_cover_type'];
$_SESSION['seat_cover_type'] = $_POST['seat_cover_type'];

$seat_color = $_POST['seat_color'];
$_SESSION['seat_color'] = $_POST['seat_color'];

if(isset($_POST['ok'])){

	$send = mysqli_query($link, 
		"INSERT INTO `seats` VALUES (NULL, 1, 
		'$value, 
		'$seat_cover_type,
		'$seat_color
		');
		"
	);
	header('Location: index.php');
}

if (isset($_POST['discard'])) {
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>KaB HandMade - перетяжка сидений мотоциклов</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style_send.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>

<h1>ПОДТВЕРДИТЕ ВАШ ВЫБОР</h1>

<form action="" method="POST">
	Мотоцикл - <input type="text" value="<?echo $value?>"> <br>
	Тип материала - <input type="text" value="<?echo $_SESSION['seat_cover_type']?>"> <br>
	Цвет материала - <input type="text" value="<?echo $_SESSION['seat_color']?>"> <br>

	<input type="submit" value="ДА, ВСЕ ПРАВИЛЬНО" name="ok">
	<input type="submit" value="ВЕРНУТЬСЯ К ВЫБОРУ" name="discard">
</form>

</body>
</html>