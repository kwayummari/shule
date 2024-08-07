<?php
// include './response.php';
include('connection.php');
class API{
    function Select(){
        $db = new Connect;
        $users = array();
        $id = $_POST['id'];
        
        $data = $db->prepare('SELECT * FROM _request_add WHERE rid = "'.$id.'"');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $user = array(
                'price'   => $OutputData['price'],
                'item'   => $OutputData['item'],
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