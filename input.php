<?php
$servername = "localhost";
$username = "admin";
$password = "F20lk4Z20";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$_email = $_POST['email_in'];
$_pass = $_POST['pass_in'];

if ($_email== NULL || $_pass == NULL)
{
	include "interval2.html";
}
else
{
	$result = mysqli_query($conn,"SELECT email FROM log WHERE email='$_email' AND password='$_pass'");
	$row_cnt = mysqli_num_rows($result);
	if($row_cnt > 0)
	{
		include "successfully1.html";
	}
	else
	{
		include "error2.html";
	}
}
?>