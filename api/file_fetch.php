<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: GET");

include('../controller/function.php');
include('../controller/connection.php');

$get_json = file_get_contents('php://input');
$parsing_json = json_decode($get_json);

$id=$parsing_json->id;
$select = $api_obj->fetch_update_data("CALL update_file('$id')");

$data = mysqli_fetch_array($select);
$new_arr = array();

$all_details = array(
                    "id"=>$data["id"],
                    "name"=>$data["name"],
                    "education"=>$data["education"],
                    "photo"=>$data["image"]
                );
array_push($new_arr,$all_details);
print(json_encode($new_arr));
?>