<?php
$db =mysqli_connect('localhost','root','','shule');
   $username=$_POST["u"];
   $password=$_POST["p"];

   $sql = "SELECT * FROM users WHERE username = '".$username."'";
   $result=mysqli_query($db,$sql);
   if(mysqli_num_rows($result) > 0){
       echo json_encode('exist');
   }else {
    $sql="INSERT INTO users(
        username,password,status)
       values('$username','$password',2)";
       if(mysqli_query($db,$sql)){
         echo json_encode('done');
       }
       else{
         echo json_encode('failed');
       }
   }
   

 ?>
