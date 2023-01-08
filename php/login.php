<?php
$login = $_REQUEST['username-login'];
$pwd = $_REQUEST['pwd-login'];
echo 'your login: '.$login.'</br>';
echo 'your password: '.$pwd;


$mysqli = new mysqli("localhost","root","password","biblioteka");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// prepare and bind
$stmt = $mysqli -> prepare("INSERT INTO users (first_name, lastname, email) VALUES (?, ?, ?)");
$stmt -> bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt -> execute();
?>