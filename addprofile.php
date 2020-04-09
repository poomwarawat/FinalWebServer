<?php
    include_once "conn.php";

    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'POST':
            $url = $_POST["url"];
            $id = $_POST["id"];

            $sql = "UPDATE User SET profileurl='$url' WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

        break;
    }
?>