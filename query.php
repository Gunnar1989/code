<?php
// required headers
header("Access-Control-Allow-Origin: http://34.89.13.107:3000");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// include database and object files
include_once './connection.php';
include_once './file.php';


$database = new Database();
$db = $database->getConnection();

$task = new File($db);  
$task->accessID = isset($_GET['accessID']) ? $_GET['accessID'] : die(); 
$task->readOne();

if($task->accessID!=null){
    $task_arr = array(
        "accessID" => $task->accessID,
        "storageID" => $task->storageID,
        "filetype" => $task->filetype
    );
  
    http_response_code(200);
    echo json_encode($task_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(array("message" => "Task does not exist."));
}
?>