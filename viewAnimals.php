<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animals</title>

  </head>
  <body>
    <table cellspacing="0"  cellpadding="5">

  <tr>
    <th>Name</th>
    <th>Date of Birth</th>
    <th>Description</th>
    <th>Picture</th>
    <th>Availabiltiy</th>
  </tr>
</table>

<tr><th>name</th> <th >date_of_birth</th><th >description</th> <th >picture</th><th >available</th><th ></tr>

<?php
  try{
    $rows = $db->query("SELECT * FROM animal_info");

    foreach ($rows as $row) {
      echo  "<tr><td >" . $row['name'] . "</td><td >" . $row['date_of_birth'] . "</td><td >" . $row['description'];
      echo "</td><td >" . $row['picture'] . "</td><td >" . $row['available']. "</td></tr>\n";
    }

    echo "</table> <br>";
  } catch (PDOException $ex){

    echo "Sorry, a database error occurred when querying the animal records. Please try again.<br> ";
    echo "Error details:". $ex->getMessage();
  }

?>

  </body>
</html>
