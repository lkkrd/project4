<?php 
class signUpControl {
//deklarujemy properties, w sumie nie musimy tego robić (chyba?)
protected $firstname;
protected $lastname;
protected $email;
protected $password;
protected $pwdrepeat;
protected $dbh;

//konstruktor
//w pliku signup.inc tworzymy object tej klasy (instantiate a class)
//tworząc ten obiekt przypiszemy zmienne do properties
   public function __construct($firstname, $lastname, $email, $password, $pwdrepeat) {
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->password = $password;
      $this->pwdrepeat = $pwdrepeat;
      $this->email = $email;
   }
   

   //tutaj będą zamieszczone wszystkie error handlers
   private function isFilledAll (){
      if(empty( $this->firstname || $this->lastname || $this->password || $this->pwdrepeat || $this->email)) {
         return false;
      }
      return true;
   }

   private function isPasswordMatch(){
      if($this->password != $this->pwdrepeat){
         return false;
      }
      return true;
   }

   //metoda sprawdza czy email ma wzorzec emailu: @, domena
   private function isEmailEmailish() {
      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
         return false;
      }
      return true;
   }   

   private function testSgnControll() {
      echo '<br> sgnControll works!!';
   }
}