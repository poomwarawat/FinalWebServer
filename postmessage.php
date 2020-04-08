<?php
    include_once "conn.php";

    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'POST':
            $email = $_POST["email"];
            $data = $_POST["data"];
            $date = $_POST['date'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];

            $sql = "INSERT INTO `Post` (`email`, `data`, `date`, `name`, `lastname`) VALUES('$email', '$data', '$date', '$name', '$lastname');";
            mysqli_query($conn, $sql);
            echo "success";

        break;
    }
?>