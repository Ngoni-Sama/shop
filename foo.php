<?php
session_start();
require_once 'admin/function.php';
$mysqli = connect();
  // Переменные с формы
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$region = $_POST['region'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$login = $_POST['login'];
	
		
	// Проверка повтора пороля
	if ($_POST['password1'] != $_POST['password2']) header("Location: registration.php");
	else $password = $_POST['password1'];
	// Проверка имеющегося logina
	$result = $mysqli->query("SELECT * FROM customers");	// Достаем всех клиентов, чтобы сверить login
	$rows = $result->num_rows;
	for ($j=0; $j<$rows; ++$j) {	
	$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	if ($row['login'] == $login) header("Location: registration.php");
	}
	//Если нет такого пользователя
	
		
	$result_add = $mysqli->query("INSERT INTO customers (first_name, middle_name, last_name, zip, phone, login, pass) 
						VALUES ('$first_name', '$middle_name', '$last_name', '$zip', '$phone', '$login', '$password')");
	
    if ($result_add == true){
    	echo "Информация занесена в базу данных<br>";
    }else{
    	echo "Информация не занесена в базу данных<br>";
    }

    $result_add = $mysqli->query("INSERT INTO cities (zip, city, region) 
						VALUES ('$zip', '$city', '$region')");
	
    if ($result_add == true){
    	echo "Информация занесена в базу данных<br>";
    }else{
    	echo "Информация не занесена в базу данных<br>";
    }


	if (!$result_add) {
    echo 'Ошибка запроса: ' . mysql_error();
    exit;
	}
	
	$result = $mysqli->query("SELECT id FROM customers WHERE login = '$login'");
	$row= $result->fetch_array(MYSQLI_ASSOC);
	$id = $row['id'];
	
	if ($result_add == true) {
		$_SESSION['id_user'] = $id; // Глобальная переменная айди зареганного пользователя, чтобы при переходе проверить по нему active
		header("Location: profile.php"); // После регистрации переход в профиль
	}

?>