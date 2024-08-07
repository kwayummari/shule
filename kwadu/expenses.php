<?php
// include './response.php';
include('connection.php');
class API{
    function Select(){
        $db = new Connect;
        $users = array();
        
        $data = $db->prepare('SELECT * FROM _request WHERE status = 1');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $user = array(
                'id'   => $OutputData['id'],
                'request' => $OutputData['request'],
                'date'  => $OutputData['date'],
                'end_date'  => $OutputData['end_date'],

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

