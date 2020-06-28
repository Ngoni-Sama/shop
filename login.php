<?php

echo <<<_END
<html>
	<head>
		<title>Авторизация</title>
	</head>

	<body>
		<h1>Авторизация</h1>
		<form method="post" action="log_func.php">
		<p>Логин<br>
		<input type="text" name="login" required></p>
		<p>Пароль<br>
		<input type="password" name="password1" required></p>
		<button type="submit">Войти</button>
		</form>
	</body>
</html>
_END;

?>