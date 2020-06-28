<?php
session_start();
require_once 'admin/function.php';
$mysqli = connect();
	


	if (!isset($_SESSION['id_user'])) echo <<<_END
	<p>Уже есть аккаунт? - <a href="login.php">Авторизуйтесь</a></p>
	<p>Еще нет аккаунта? - <a href="registration.php">Зарегистрируйтесь</a></p>
	_END;
	else {
	echo <<<_END
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<header></header>
	<main>
	<button><a href="index.html">Главная</a></button>
	<p>
	<div class="main-cart"></div>
	<div class="email-field">
	<!--<p>Имя: <input type="text" id="ename"></p>
	<p>Телефон: <input type="text" id="ephone"></p>-->
	
	<button type="submit" name="buy" class="buy">Оплатить</button>
	<p>
	</div>
	</main>
	<footer></footer>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/cart.js"></script>
	<form method="post" action="exit.php">
	<button type="submit" name="logout">Выйти</button>
	</body>
	</html>
	
	_END;
	
		}
	
?>

