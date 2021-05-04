<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <title>Register User</title>
  </head>
  <body>
    <form action='' method="post">
      <div><br>Please enter your details.<br>
        <input type="text" name="username" value="" placeholder = "Enter your username"> <br><br>
        <input type="password" name="password" value="" placeholder = "Enter your password"><br><br>
        <input type="password" name="password1" value="" placeholder = "Re-enter your password"><br><br>
        <input type="submit" name="createUser" value="Submit" placeholder = "Create User"> <br><br>

      </div>

    </form>
  </body>
</html>
<?php
if (isset($_POST["createUser"])){



    if($_POST["password"]==$_POST["password1"]){
      $registerUser = $this->model->create_user($_POST["username"],$_POST["password"]);

    } else{
      echo("Error: The passwords do not match, please re-enter password");
    }


}
 ?>
