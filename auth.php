<?
session_start();

if (isset($_SESSION['username'])) {
	
    if ($_SESSION['role'] == 1)
    echo '<meta http-equiv="refresh" content="0;customer.php">';
    exit();

    if ($_SESSION['role'] == 2)
    echo '<meta http-equiv="refresh" content="0;admin.php">';
    exit();
}

/* СКРИПТ АВТОРИЗАЦИИ */
require_once 'connection.php';

$userLoginOrEmail = ($_POST['userLoginOrEmail']);
$userPassword = $_POST['userPassword'];
$loginSubmit = $_POST['loginSubmit'];
    
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles/style_auth.css">
    <meta charset="utf-8">
    <title>АВТОРИЗАЦИЯ</title>
</head>
<body>

    <div class="wrapper">

        <h1 style="margin-top: 2%;">АВТОРИЗАЦИЯ</h1>

        <form action="" method="POST">
            <input type="text" name="userLogin" placeholder="Введите логин" required autocomplete="off" class="inputText">
            <input type="password" name="userPassword" placeholder="Введите пароль" required class="inputText">
            <input type="submit" name="loginSubmit" value="Тук-тук. ВОЙДИТЕ!" class="buttons" style="margin-top: 5%;">
        </form>

    <?
        if (isset($loginSubmit)) {

        $count = mysqli_query($connection, "SELECT * FROM `users` WHERE (`login` = '$userLoginOrEmail' or `email` = '$userLoginOrEmail')  AND `password` = '$userPassword';");
        $countResult = mysqli_fetch_assoc($count);
        $userName = $countResult['name'];
        $userRole = $countResult['role'];

        $numRowsFromCount = mysqli_num_rows($count);

            if ($numRowsFromCount == 1) {

                echo "<p class='textInRamke' style='margin-bottom: 10px;'>Логин и пароль верны!</p>";
                $_SESSION['username'] = $userLogin;
                $_SESSION['role']=$userRole;

                if ($countResult['role'] == 1) {
                    echo "<p class='textInRamke'>Привет, " . $userName . "! Сейчас Вы будете перенаправлены на страницу заказа!</p>";
                    echo '<meta http-equiv="refresh" content="3;customer.php">';
                }

                if ($countResult['role'] == 2) {
                    echo "<p class='textInRamke'>Привет, " . $userName . "! Сейчас Вы будете перенаправлены на странгицу администратора!</p>";
                    echo '<meta http-equiv="refresh" content="3;admin.php">';
                }

                if (empty($countResult['role'])) {
                    echo 'Логин и пароль неправильные!';
                }
            }

            else {
                echo "<p class='warning'>Логин и пароль неверны!</p>";
            }
        }
    ?>

        <h1 style="margin-bottom: 2%;">НЕЗАРЕГИСТРИРОВАННЫЙ НЕ ПРОЙДЕТ!</h1>
        <a href="registration.php" class="buttons" style="text-align: center;">ЗАРЕГИСТРИРОВАТЬСЯ!</a>

    </div>

</body>
</html>