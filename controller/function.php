<?php
class file_upload_api
{
    public $host;
    public $user;
    public $pass;
    public $db_name;

    function __construct($host,$user,$pass,$db_name)
    {
        $this->conn = mysqli_connect($host,$user,$pass,$db_name);
        if(!$this->conn)
        {
            print('Connection established unsuccessful! '.mysqli_connect_error());
            exit();
        }
    }

    function insert($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function select($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function fetch_update_data($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function save_update_data($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }

    function delete($sql_stmt)
    {
        return mysqli_query($this->conn, $sql_stmt);
    }
}
?>