<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: GET");

include('../controller/function.php');
include('../controller/connection.php');

$select = $api_obj->select('CALL fetch_file');
$new_arr = array();
$new_arr['details'] = array();

if(mysqli_num_rows($select) > 0)
{
    while($data = mysqli_fetch_array($select))
    {
        $all_details = array("id"=>$data["id"],"name"=>$data["name"],"education"=>$data["education"],"photo"=>$data["image"]);
        array_push($new_arr['details'],$all_details);
    }
    print(json_encode($new_arr));
}
else
{
    print(json_encode(array("message"=>"No record available!")));
}
?>