<?php
$servername = "localhost";
$username = "admin";
$password = "F20lk4Z20";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$_login = $_POST['login'];
$_email = $_POST['email'];
$_pass = $_POST['pass'];

if ($_login == NULL || $_email== NULL || $_pass == NULL)
{
	include "interval1.html";
}
else
{
	$result = mysqli_query($conn,"SELECT login FROM log WHERE login='$_login'");
	$row_cnt = mysqli_num_rows($result);
	if($row_cnt > 0)
	{
		include "error1.html";
	}
	else
	{
		$sql = "INSERT INTO log (login, email, password) VALUES ('$_login','$_email','$_pass')";
		if ($conn->query($sql) === TRUE) 
		{
			include "successfully2.html";
		}
		else {echo "Error: Ошибка соединения с базой данных, попробуйте позденее";}
	}
}
?>