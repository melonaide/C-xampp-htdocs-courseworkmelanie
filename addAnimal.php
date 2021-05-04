
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Animal</title>
  </head>
  <body>
  <form method="post" enctype="multipart/form-data" >
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="description" placeholder = "Description">
    <input type="date" name="Date of Birth" >
    <input type="file" name="File" >
    <input type="submit" name="submit" value="Submit">
  </form>

  </body>
  <?php
  if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
  $fileDir = "images/";
  //where all pictures are stored
  $fileName = $_FILES["file"]["name"];
  $tempFileName = $_FILES['file']['tmp_name'];
  //path of the file
  $filePath = $fileDir . $fileName;

  $fileType = pathinfo($filePath,PATHINFO_EXTENSION);
//gets the types of the file
  $acceptedTypes = array('jpg','png','jpeg');
  if($_POST["name"]!= null && $_POST["description"]!= null && $_POST["date_of_birth"]!= null){
    //checks so that no null values are entered
    if(in_array($fileType,$acceptedTypes) ){
      //checks if the uploaded file is an accepted image
      if(move_uploaded_file($tempFileName,$filePath)){
        //check if the file has been uploaded
        //enters animal infor into database
        //availability is always assumed false and ID is auto autoincrement
        $this->model->addAnimal($_POST["name"],$_POST["description"],$_POST["date_of_birth"],$fileName);


      } else {
        echo("There was an error in uploading your file");
      }


  } else{
    echo("Please use one of the selected filetypes: <br>JPG PNG JPEG<br>");
  }

}else{
  echo("Make sure all fields are filled out before submitting");
}
}
 else{
  echo("Upload a file");

}
   ?>
</html>
