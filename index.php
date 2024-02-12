<?php
include("connection.php");
 
if(isset($_POST['but_upload'])){
   $maxsize = 1005242880;
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "files/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg", "mp3", "wav", "borvis", "pdf");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO account2(name,location) VALUES('".$name."','".$target_file."')";

               mysqli_query($connection,$query);
               $_SESSION['message'] = "Uploaded successfully.";
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
   header('location: index.php');
   exit;
} 
?>

<!doctype html> 
<html> 
  <head>
     <title>File Upload</title>
  </head>
  <style>
   body {
  background-color: transparent;
}

h1{
   text-align: center;
   font-size: 30px;
   margin-top: 4%;
}

form {
   align-items: center;
   text-align: center;
  color: maroon;
  margin-top: 4%;
}

input {
   margin-top: 2%;
   background-color: transparent;
}

</style>
  <body>
    <?php 
    if(isset($_SESSION['message'])){
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    }
    ?>
    <img src="./assets/logo.ico" alt="mylogo" width="150" height="120"><br>
    <h1>3D Music Converter</h1>
    <form method="post" action="" enctype='multipart/form-data'>
      <input type='file' name='file' /><br>
      <input type='submit' value='Convert' name='but_upload'>
    </form>
  </body>
</html>