<?php
session_start();
require_once 'admin/function.php';
$mysqli = connect();
	
	$login = $_POST['login'];
	$password = $_POST['password1'];
	
	$result = $mysqli->query("SELECT * FROM customers WHERE login='$login' AND pass='$password'");
	if (!$result) echo "Сбой при вставке данных: $query<br>" .
			$mysqli->error . "<br><br>";
	$row = $result->fetch_array(MYSQLI_ASSOC);
	if (!$row) echo "Wrong email or password!";
	else {
	if(!empty($row['id'])) {
		$_SESSION['id_user'] = $row['id'];
		header("Location: profile.php");
	}
}
?>