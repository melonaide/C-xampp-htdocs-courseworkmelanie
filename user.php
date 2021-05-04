<?php
class User {
  private $userID=null;
  private $username = null;
  private $password=null;

  public function construct($username, $password) {
      $this->username = $usename;
      $this->password = $password;
  }

  # get method
  public function __get($var){
    return $this->$var;
  }


}
?>
