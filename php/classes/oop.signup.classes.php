<?php
class singup extends signUpControl{
   
   public function signUpUser($firstname, $lastname, $email, $password){
      
      $dbh = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', 'password');

      $stmt = $this->$dbh->prepare('INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)');

      // $stmt->bindParam('s', $email); - takie coś zostawia lukę na sqlinjection

      //executing statement
      if($stmt->execute(array($firstname, $lastname, $email, $password))) {
         echo '<br> <stong> User '.$firstname.' '.$lastname.' added to DB </strong>';
      }

      //jeśli nie uda się wykonać stmt, chcemy usunąć zapytanie i wrócić do strony głównej
         else {
         $stmt = null;
         header ('location: ..\..\forms\signup.html');
         exit();
         }
}
      private function testSgn() {
         echo 'sgn works!!';
      }
}