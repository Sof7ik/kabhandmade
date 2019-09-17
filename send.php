<?php
session_start();
require ('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="styles/style_customer.css">
</head>
<body>

</body>
</html>

<?php

$userId = $_SESSION['userId'];
$userName = $_SESSION['username'] ;
$userSurname = $_SESSION['surname'];

/*$moto = $_POST['motocycle_type_select'];*/
$moto = htmlentities(mysqli_real_escape_string($link, $_POST['motocycle_type_select']));
//Берем значение из селекта (хз, как оно так работет, но у Мишы работало, значит и у меня заработает. Миша aka HighTechnologiesHere)

//$seat_cover_type = $_POST['seat_cover_type'];
$seat_cover_type = htmlentities(mysqli_real_escape_string($link, $_POST['seat_cover_type']));

//$seat_cover_color = $_POST['seat_cover_color'];
$seat_cover_color = htmlentities(mysqli_real_escape_string($link, $_POST['seat_cover_color']));

//$anti_skid_stripes_yes_or_no = $_POST['anti_skid_stripes_yes_or_no'];
$anti_skid_stripes_yes_or_no = htmlentities(mysqli_real_escape_string($link, $_POST['anti_skid_stripes_yes_or_no']));

//$anti_skid_stripe_type = $_POST['anti_skid_stripe_type'];
$anti_skid_stripe_type = htmlentities(mysqli_real_escape_string($link, $_POST['anti_skid_stripe_type']));

//$anti_skid_stripe_color = $_POST['anti_skid_stripe_color'];
$anti_skid_stripe_color = htmlentities(mysqli_real_escape_string($link, $_POST['anti_skid_stripe_color']));

if ($anti_skid_stripe_type == "" || $anti_skid_stripes_yes_or_no == "Нет") {
	$anti_skid_stripe_type = "Нет";
}

if ($anti_skid_stripe_color == "" || $anti_skid_stripes_yes_or_no == "Нет") {
	$anti_skid_stripe_color = "Нет";
}

if ($anti_skid_stripes_yes_or_no == "Есть" || $anti_skid_stripe_type == "") {
	$anti_skid_stripe_type = "Матерчатые";
}

if ($anti_skid_stripes_yes_or_no == "Есть" || $anti_skid_stripe_color == "") {
	$anti_skid_stripe_color = "Чёрный";
}

echo "Название мотоцикла - " . $moto . "<br>";
echo "Тип ткани - " . $seat_cover_type . "<br>";
echo "Цвет ткани - " . $seat_cover_color . "<br>";
echo "Полосы антискольжения - " . $anti_skid_stripes_yes_or_no . "<br>";
echo "Тип полос антискольжения - " . $anti_skid_stripe_type . "<br>";
echo "Цвет полос антискольжения - " . $anti_skid_stripe_color . "<br>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "Имя - " . $_SESSION['username'];
echo "<br>";
echo "Фамилия - " . $_SESSION['surname'];
echo "<br>";
echo "Роль - " . $_SESSION['role'];
echo "<br>";
echo "ID user - " . $_SESSION['userId'];
echo "<br>";

echo "<a class='cart' href='customer.php'>НА ГЛАВНУЮ</a>";

$query = "INSERT INTO `seats`(
`id_seat`, 
`id_user`, 
`name`, 
`surname`,
`moto`, 
`coverType`, 
`coverColor`, 
`antiSkidStripes`, 
`antiSkidStripesType`, 
`antiSkidStripesColor`
) 
VALUES (
NULL,
'$userId',
'$userName',
'$userSurname',
'$moto', 
'$seat_cover_type', 
'$seat_cover_color', 
'$anti_skid_stripes_yes_or_no', 
'$anti_skid_stripe_type', 
'$anti_skid_stripe_color');";

$send = mysqli_query($link, $query);

if ($send) {
	echo "Заказ сделан! Сейчас обратно будет";
	echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=customer.php'>";
}

else {
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "Не удалось заказать... Попробуйте позже";

	echo mysqli_error($query);
	echo "Переменная send " . var_dump($send);

	echo "<br>";
	echo "<a class='cart' href='customer.php'>НА ГЛАВНУЮ</a>";
}
?>