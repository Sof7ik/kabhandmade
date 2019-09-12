<?php
require_once ('connection.php');
session_start();

/*if (!isset($_SESSION['seat_cover_type'])) {
	header('Location: index.php');
}*/

/*$value = $_POST['motocycle_type_select'];*/
$value = $_POST['motocycle_type_select'];
//Берем значение из селекта (хз, как оно так работет, но у Мишы работало, значит и у меня заработает. Миша aka HighTechnologiesHere)

$seat_cover_type = $_POST['seat_cover_type'];

$seat_color = $_POST['seat_color'];

if(isset($_POST['moto'])){

	$send = mysqli_query($link, 
		"INSERT INTO `seats` VALUES (NULL, 1, 
			'$moto', 
			'$type',
			'$color'
		);"
	);
}

if ($send) {
	echo "Заказ сделан! Сейчас обратно будет";
	echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=index.php'>";
}

else {
	echo "Не удалось заказать... Попробуйте позже";
	echo "<a href='index.php'>НА ГЛАВНУЮ</a>";
}

if (isset($_POST['discard'])) {
	echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php'>";
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
	Мотоцикл - <input type="text" name="moto" required value="<?echo $value?>"> <br>
	Тип материала - <input type="text" name="type" required value="<?echo $seat_cover_type?>"> <br>
	Цвет материала - <input type="text" name="color" required value="<?echo $seat_color?>"> <br>

	<input type="submit" value="ДА, ВСЕ ПРАВИЛЬНО" name="ok">
	<input type="submit" value="ВЕРНУТЬСЯ К ВЫБОРУ" name="discard">

	<?
	echo "<META HTTP-EQUIV='REFRESH' CONTENT='1000;URL=index.php'>";
	$_POST['moto'] = $moto;
	$_POST['type'] = $type;
	$_POST['color'] = $color;
	echo "$moto";
	echo "$type";
	echo "$color";
	?>
</form>

</body>
</html>