<?php
session_start();
// Проверяем наличие параметра
require_once 'admin/function.php';

echo <<<_END
<html>
	<head>
		<title>Регистрация</title>
	</head>
	<h1>Регистрация</h1>
	<p>Если у вас уже есть профиль, то <a href="login.php">войдите</a> в личный кабинет</p>
	<body>
		<form method="post" action="foo.php">
		<p>Имя<br>
		<input type="text" name="first_name" required></p>
		<p>Отчество<br>
		<input type="text" name="middle_name" required></p>
		<p>Фамилия<br>
		<input type="text" name="last_name" required></p>
		<p>Область, край<br>
		<input type="text" name="region" required></p>
		<p>Населенный пункт<br>
		<input type="text" name="city" required></p>
		<p>Почтовый индекс<br>
		<input type="text" name="zip" required></p>
		<p>Телефон<br>
		<input type="text" name="phone" required></p>
		<p>Логин<br>
		<input type="text" name="login" required></p>
		<p>Пароль<br>
		<input type="password" name="password1" required></p>
		<p>Повторите пароль<br>
		<input type="password" name="password2" required></p>
		<button type="submit">Зарегистрироваться</button>
		</form>
	</body>
</html>
_END;
?>
