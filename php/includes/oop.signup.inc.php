<?php

//declaring data
$firstname = strtoupper($_POST['first-name-signup'] );
$lastname = strtoupper($_POST['last-name-signup']);
$email = strtoupper($_POST['email-signup']);
$password = $_POST['pwd-signup'];

//instantiate signup-control class
include "..\classes\oop.singup-control.classes.php";
include "..\classes\oop.signup.classes.php";
$user = new signUpControl($firstname, $lastname, $email, $password, $pwdrepeat);

echo $user;


