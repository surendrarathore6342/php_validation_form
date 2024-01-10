<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $database = "guarder_free";

    $arr = new mysqli($severname, $username, $password, $database);

    if($arr->connect_error){
        die("Connection Faild" . $arr->connect_error);
    }
    // echo "Connection Successfully";
?>