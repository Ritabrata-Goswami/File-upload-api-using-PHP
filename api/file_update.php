<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: POST");

include('../controller/function.php');
include('../controller/connection.php');


$id = $_POST['id'];
$name = $_POST['enter_name'];
$edu = implode(",",$_POST['enter_education']);
$file = basename($_FILES['enter_file']['name']);
$tmp_name = $_FILES['enter_file']['tmp_name'];


if(empty($file)===true)
{
    // $select = $api_obj->fetch_update_data("CALL update_file('$id')");
    // $data = mysqli_fetch_array($select);
    // $file_default = $data['image'];
    
    $save_update_without_file = $api_obj->save_update_data("CALL save_update_without_file('$id','$name','$edu')");
    if($save_update_without_file)
    {
        print(json_encode(array("message"=>"Update successful without file!")));
    }
    else{
        print(json_encode(array("message"=>"Update failed! ".mysqli_error($api_obj->conn))));
    }
}
else
{
    $save_update = $api_obj->save_update_data("CALL save_update_file('$id','$name','$edu','$file')");
    if($save_update){
        $path = 'upload-file/'.$file;
        move_uploaded_file($tmp_name,$path);
        print(json_encode(array("message"=>"Update successful with file!")));
    }
    else{
        print(json_encode(array("message"=>"Update failed! ".mysqli_error($api_obj->conn))));
    }

}
?>
