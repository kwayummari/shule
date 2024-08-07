<?php
// include './response.php';
header("Access-Control-Allow-Origin: *");
// require_once __DIR__ . '/connection.php';
include('connection.php');

class API{
    function Select(){
        $db = new Connect;
        $users = array();
        $school_name = $_POST['school_name'];

        // $id = mysqli_real_escape_string($db,$_POST['id']);
        
        $data = $db->prepare('SELECT * FROM profile_image WHERE  school_name = "'.$school_name.'"');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $user = array(
                'image'  => $OutputData['image'],

            );
            array_push($users,$user);
        }
        return json_encode($users);
    }
    // sendResponse(200, $user, 'news');
}
$API = new API; 
header('Content-Type: application/json');
echo $API -> Select()

?>

