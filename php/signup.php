<?php

function singUpUser() {
$mysqli = new mysqli("localhost","root","Mikamen2","biblioteka");

// Declare signup values
$firstname = strtoupper($_REQUEST['first-name-signup'] );
$lastname = strtoupper($_REQUEST['last-name-signup']);
$email = strtoupper($_REQUEST['email-signup']);
$password = $_REQUEST['pwd-signup'];

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit(); }
  else {
    echo '<br> connection works';
  }


// prepare and bind
$stmt = $mysqli -> prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
$stmt -> bind_param("ssss", $firstname, $lastname, $email, $password);

// set parameters and execute
if ($stmt -> execute()) {
  echo '<br><strong>'.$firstname.' '.$lastname.' has been added to database </strong>';
}

echo '<br> <a href="..\forms\signup.html"> Go back to signup page</a>' ;
}

singUpUser();
?>
