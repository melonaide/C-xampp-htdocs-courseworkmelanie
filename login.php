
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action='' method="post">
      <label>Username</label><br/>
      <input type="text" name="username" value="">
      <p>Password</p>
      <input type="password" name="password" value=""> <br><br>
      <input type="submit" name="submit" value="Login">
      <input type="hidden" name="submitted" value="true"/>
    </form>
    <?php


    if(isset($_POST["submit"]))
  {
    if($this->model->validate_user($_POST["username"],$_POST["password"])==true){
      setcookie("username",$_POST["username"]);
      echo("Thank you");
    }
    else{
      echo("Your username or password is incorrect");
    }
  }
     ?>
  </body>
</html>
