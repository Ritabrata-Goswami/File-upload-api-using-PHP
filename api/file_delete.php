<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: GET");

include('../controller/function.php');
include('../controller/connection.php');

$get_json = file_get_contents('php://input');
$parsing_json = json_decode($get_json);

$id=$parsing_json->id;

$update = $api_obj->delete("CALL delete_file('$id')");
if($update)
{
    print(json_encode(array("message"=>"Deleted successful!")));
}
else
{
    print(json_encode(array("message"=>"Delete failed! ".mysqli_error($api_obj->conn))));
}
?>
