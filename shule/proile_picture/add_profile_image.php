<?php
$db =mysqli_connect('localhost','root','','shule');
   $image = $_FILES['image']['name'];
   $imagePath = 'upload/'.$image;
   $tmp_name = $_FILES['image']['tmp_name'];
   move_uploaded_file($tmp_name,$imagePath);
   $school_name=$_POST["school_name"];


   $sql0 = 'SELECT * FROM profile_image WHERE  school_name = "'.$school_name.'"';
   $result0=mysqli_query($db,$sql0);
   if (mysqli_num_rows($result0) > 0) {
    $sql = "UPDATE  profile_image SET image = '".$image."' WHERE school_name = '".$school_name."'";
    $result1=mysqli_query($db,$sql1);
   } else {
       $sql2 = "INSERT INTO profile_image(image,school_name) values('$image','$school_name')";
       $result2=mysqli_query($db,$sql2);
   }
   
   

 ?>
