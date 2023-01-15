<?php
//TODO: dbh idzie tutaj

//declaring data
$firstname = strtoupper($_POST['first-name-signup'] );
$lastname = strtoupper($_POST['last-name-signup']);
//adresy mailowe są case insensitive
$email = strtoupper($_POST['email-signup']); 
$password = $_POST['pwd-signup'];
$pwdrepeat = $_POST['pwd-repeat-signup'];

//instantiate signup-control class
include "..\classes\oop.signup-control.classes.php";
$user = new signUpControl($firstname, $lastname, $email, $password, $pwdrepeat);  

//testujemy, czy user jest przypisany do klasy
if (is_a($user, 'signUpControl')) {
   echo '<br><strong> User is object of signUpControl class!</strong></br>';
   var_dump($user);
} else {
   echo '<br><strong> user is not an singUpCOntrol object</strong>';
}

//TODO: funkcja isFilledAll traktuje string = '' jako not empty
if (!$user->isFilledAll()) {
   echo '<br><strong>Error handler:</strong> nie wszystkie pola są wypełnione';
   exit();
} else {
   echo '<br>wszystkie pola są wypełnione';
}

if (!$user->isPasswordMatch()){
   echo '<br><strong>Error handler:</strong> Podane hasła nie są takie same';
   exit();
}

if (!$user->isEmailEmailish()){
   echo '<strong>Error handler:</strong> podany email jest niepoprawny';
   exit();
}

//TODO: why can't I call this function when private?
$user->signUpUser();

