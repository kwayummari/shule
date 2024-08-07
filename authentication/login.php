<?php
$db =mysqli_connect('localhost','root','','shule');
$u = $_POST['u'];
$p = $_POST['p'];

if ($u == '' || $p == '') {
   echo json_decode("Empty");
}else {
    $sql = "SELECT * FROM users WHERE username = '".$u."' AND password = '".$p."'";
}
$result=mysqli_query($db,$sql);
// mysqli_num_rows is counting table row
if(mysqli_num_rows($result) > 0){
$rows = mysqli_fetch_assoc($result);

 
//Direct pages with different user levels
if ($rows['status'] == 1) {
    echo json_encode("shule"); 
}
else
if ($rows['status'] == 2) {
    echo json_encode("user");
	}
} else if (mysqli_num_rows($result) == 0) {
    echo json_encode("wrong");
}
?>