<?php
$db =mysqli_connect('localhost','tazaratc_tzr','tazara20182018','tazaratc_kwadu');
// $db =mysqli_connect('localhost','root','','shule');
$u = $_POST['u'];
$p = $_POST['p'];

if ($u == '' || $p == '') {
   echo json_decode("Empty");
}else {
    $sql = "SELECT * FROM _users WHERE username = '".$u."' AND password = '".$p."'";
}
$result=mysqli_query($db,$sql);
// mysqli_num_rows is counting table row
if(mysqli_num_rows($result) > 0){
$rows = mysqli_fetch_assoc($result);

 
//Direct pages with different user levels
if ($rows['active'] == 1) {
    if ($rows['level'] == 'admin') {
        echo json_encode("admin"); 
    }
    else
    if ($rows['level'] == 'user') {
        echo json_encode("user");
        }
}
} else if (mysqli_num_rows($result) == 0) {
    echo json_encode("wrong");
}
?>