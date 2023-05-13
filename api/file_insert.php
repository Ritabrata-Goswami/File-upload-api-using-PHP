<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: POST");

include('../controller/function.php');
include('../controller/connection.php');

$get_json_content = file_get_contents('php://input');
$json_decode = json_decode($get_json_content);

$name = $_POST['enter_name'];
$edu = implode(",",$_POST['enter_education']);
$file = basename($_FILES['enter_file']['name']);
$tmp_name = $_FILES['enter_file']['tmp_name'];


if(empty($name)===true || count($_POST['enter_education'])==0 || empty($file)===true)
{
    print(json_encode(array("message"=>"Blank field are not allowed!")));
}
else
{
    $insert = $api_obj->insert("CALL insert_file('$name','$edu','$file')");
    if($insert)
    {
        $path = 'upload-file/'.$file;
        move_uploaded_file($tmp_name,$path);
        print(json_encode(array("message"=>"File Uploaded Successfully!")));
    }
    else
    {
        print(json_encode(array("message"=>"Some error occurred! ".mysqli_error($api_obj->conn))));
    }
}

?>
