<?php
include_once("model/user.php");
class Model{
  private $server;
  private $dbname;
  private $username;
  private $password;
  private $pdo;


  public function __construct($server,$dbname,$username,$password)
  {
  $this->pdo= null;
  $this->server = $server;
  $this->dbname = $dbname;
  $this->username =$username;
  $this->password = $password;
}
public function connect(){
  try{
    $this->pdo = new PDO("mysql:host=$this->server;dbname=$this->dbname","$this->username","$this->password");
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch (PDOException $ex){
    echo("Error occured while connecting to the database.<br>Error:<br>$ex->getMessage()");
  }
}
  public function create_user($username,$password){
    try{
      echo ($username."<br>".$password);
      $query = "INSERT INTO users (username,password)
      VALUES('$username','$password')";
      $this->pdo->exec($query);
      echo("record made");

    }catch(PDOException $ex){
      echo($ex);
    }
  }
  public function validate_user($username,$password){
    $query ="SELECT username,password FROM users WHERE username='$username'";
    try {
      $results=$this->pdo->query($query);
      $result=$results->fetch();
      if($username==$result[0] && $password==$result[1])
      {
        return true;
      }

    } catch (\Exception $e) {

    }

  }
  public function viewAnimals($name){
    $query="SELECT * FROM animal_info WHERE name='$name'";
    try {
      $results=$this->pdo->query($query);
      $result=$results->fetch();
return $results;
    }
    catch (\Exception $e) {

    }

}
public function addAnimal($name,$date_of_birth,$description,$picture){
  echo("error");
  $query="INSERT INTO animal_info(name,date_of_birth,description,picture,availabiltiy) VALUES(?,?,?,?,0)";
  try {
      echo("It worked");
      $pre=$this->pdo->prepare($query);
      $pre->execute([$name,$date_of_birth,$description,$picture]);



  }

  catch (\Exception $e) {

  }
}
}
?>
