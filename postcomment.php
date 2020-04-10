<?php
    include_once "conn.php";

    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'POST':
            $userID = $_POST["userID"];
            $name = $_POST["name"];
            $lastname = $_POST['lastname'];
            $data = $_POST['data'];
            $url = $_POST['url'];


            $sql = "INSERT INTO `Comment`(`userID`, `name`, `lastname`, `data`, `url`) VALUES ('$userID', '$name', '$lastname', '$data', '$url');";
            mysqli_query($conn, $sql);
        break;
    }
?>