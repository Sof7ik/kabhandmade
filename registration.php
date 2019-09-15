<?php

session_start();

if (isset($_SESSION['username']))
{
    if ($_SESSION['role'] == 1)
    echo '<meta http-equiv="refresh" content="0;customer.php">';
    exit();

    if ($_SESSION['role'] == 2)
    echo '<meta http-equiv="refresh" content="0;admin.php">';
    exit();
}

require_once 'connection.php';

$userName = $_POST['userName'];

$userSurname = $_POST['userSurname'];

$userLogin = $_POST['userLogin'];

$userEmail = $_POST['userEmail'];

$userTel = $_POST['userTel'];

$userPassword = $_POST['userPassword'];

$userPasswordSecond = $_POST['userPasswordSecond'];

$loginSubmit = $_POST['loginSubmit'];

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/style_registration.css">
	<meta charset="utf-8">
	<title>РЕГИСТРАЦИЯ</title>
</head>
<body>

	<div class="wrapper">

		<h1>РЕГИСТРАЦИЯ</h1>

		<?php

			if (isset($loginSubmit)) {

				if ($userPassword == $userPasswordSecond) {

					/*if (preg_match("/[A-Z, А-Я]/", $userPassword)) {
						$checkPassword1 = true;
					}

					else {
						echo '<p class="warning">НЕТ ЗАГЛАВНЫХ БУКВ!</p>';
					}

					if (preg_match("/[0-9]/", $userPassword)) {
						$checkPassword2 = true;
					}

					else {
						echo '<p class="warning">НЕТ ЦИФР!</p>';
					}

					if (preg_match("/[!@#№$%^&?*]/", $userPassword)) {
						$checkPassword3= true;
					}

					else {
						echo '<p class="warning">НЕТ СПЕЦ. СИМВОЛОВ!</p>';
					}

					if (strlen($userPassword) >=6) {
						$checkPassword4 = true;
					}

					else {
						echo '<p class="warning">ПАРОЛЬ СЛИШКОМ КОРОТКИЙ!</p>';
					}

					if ($checkPassword1 == true && $checkPassword2 == true && $checkPassword3 == true && $checkPassword4 == true) {*/

						$registration = mysqli_query($link, "INSERT INTO `users` (`name`, `surname`, `login`, `email`, `tel`, `password`, `id_role`) VALUES ('$userName', '$userSurname', '$userLogin', '$userEmail', '$userTel', '$userPassword', '1');");
					/*}*/

				}

				else {
					echo "<p class='warning'>Введенные пароли не совпадают!</p>";
				}	
			}
		?>

		<form action="" method="POST">
			<input type="text" name="userName" placeholder="ВВЕДИТЕ ВАШЕ ИМЯ ЗДЕСЬ" required autofocus autocomplete="off" class="inputText">

			<input type="text" name="userSurname" placeholder="ВВЕЛИТЕ СВОЮ ФАМИЛИЮ ЗДЕСЬ" required style="margin-top: 15px;" class="inputText">

			<input type="text" name="userLogin" placeholder="ВВЕДИТЕ ВАШ ЛОГИН ЗДЕСЬ" required autofocus class="inputText" autocomplete="off">

			<input type="email" name="userEmail" placeholder="ВВЕДИТЕ СВОЙ EMAIL ЗДЕСЬ" required style="margin-top: 15px;" class="inputText" autocomplete="off">

			<input type="text" name="userTel" placeholder="ВВЕДИТЕ ВАШ НОМЕР ТЕЛЕФОНА ЗДЕСЬ, 11 цифр без +" required pattern="[0-9]{11}" style="margin-top: 15px;" class="inputText">  <!-- 11 цифр-->
			
			<input type="text" name="userPassword" placeholder="ВВЕДИТЕ ВАШ ПАРОЛЬ ЗДЕСЬ" required style="margin-top: 15px;" class="inputText">

			<input type="text" name="userPasswordSecond" placeholder="ВВЕДИТЕ ПАРОЛЬ ЕЩЕ РАЗ ЗДЕСЬ" required style="margin-top: 15px;" class="inputText">

			<input type="submit" name="loginSubmit" value="ЗАРЕГИСТРИРОВАТЬСЯ!" id="loginButton" class="buttons">
		</form>

		<?php 

			if ($registration == true) {
				echo "<p style='border: 1px solid #4c6cf9; padding: 10px 15px; font-size: 20px; font-weight: bold'>Привет, " . $userName . " " . $userSurname . "! Вы успешно зарегистрировались! Сейчас вы будете перенаправлены на страницу авторизации!</p>";
				echo '<meta http-equiv="refresh" content="8;index.php">';
			}

		?>

			<h1>УЖЕ ЗАРЕГИСТРИРОВАНЫ?</h1>
			<a href="index.php" class="buttons">ВОЙДИТЕ ТОГДА!</a>

	</div>

</body>
</html>