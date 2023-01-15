<?php 
class signUpControl {
//deklarujemy properties, w sumie nie musimy tego robić (chyba?)
public $firstname;
public $lastname;
public $email;
public $password;
public $pwdrepeat;
public $dbh;

//konstruktor
//tworząc obiekt przypiszemy wartości
public function __construct($firstname, $lastname, $email, $password, $pwdrepeat) {
   $this->firstname = $firstname;
   $this->lastname = $lastname;
   $this->password = $password;
   $this->pwdrepeat = $pwdrepeat;
   $this->email = $email;
   $this->dbh = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', 'password');

}
   
//funkcja wysyłająca query do db
public function signUpUser(){

   //ktoś mądrzejszy ode mnie napisał, że bindParam zostawia lukę na sql injection
   //przygotowanie statement
   $stmt = $this->dbh->prepare('INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)'); 

   //wysyłamy statement z query do dbms
   if($stmt->execute(array($this->firstname, $this->lastname, $this->email, $this->password))) {
      echo '<br> <stong> User '.$this->firstname.' '.$this->lastname.' added to DB </strong>';
   }

   //jeśli stmt nie dotrze, chcemy usunąć zapytanie i wrócić do strony głównej
      else {
      $stmt = null;
      header ('location: ..\..\forms\signup.html');
      exit();
      }
}
   //tutaj będą zamieszczone wszystkie error handlers
   public function isFilledAll (){
      if(empty( $this->firstname || $this->lastname || $this->password || $this->pwdrepeat || $this->email)) {
         return false;
      }
      return true;
   }

   public function isPasswordMatch(){
      if($this->password != $this->pwdrepeat){
         return false;
      }
      return true;
   }

   //metoda sprawdza czy email ma wzorzec emailu: @, domena
   public function isEmailEmailish() {
      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
         return false;
      }
      return true;
   }   

   public function testName(){
      echo 'Hi! I am '.$this->firstname;
   }
}
