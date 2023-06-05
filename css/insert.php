<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "users";
$message="";
// Create connection
if(count($_POST)>0)
{
$con = mysqli_connect($servername, $username, $password, $dbname)
 or die('Unable To connect');
$sql="INSERT INTO user (userid,username,password)
VALUES ('$_POST[id]','$_POST[name]','$_POST[pw]')";

if (!mysqli_query($con,$sql))
  {
  die('SQL query error');
  }
else 
  $message="Registration Successful";
}
?>
<html>
  <body bgcolor="blue">
    <h1 align="Center" > User Registration </h1>
    <br>
    <form action="" method="post" align="center" >
      Userid:<input type="text" name="id"> <br><br><br>
      Username:<input type="text" name="name"> <br><br><br>
      Password:<input type="password" name="pw"> <br><br><br>
      <input type="submit" value="SUBMIT">
      <input type="reset" value="RESET">
      <br>
      <br>
      <div class="message" > 
        <?php 
          if($message!="") 
            { 
              echo $message."<a href=signin.php>Login here</a>"; 
            } 
        ?>
      </div>
    </form>
  </body>
</html>