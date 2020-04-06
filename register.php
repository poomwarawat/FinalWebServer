<?php
    include_once "conn.php";
    
    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            echo "GET";
            break;
        case 'POST':
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $birthday = $_POST["birthday"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            // echo $name;
            $valid = validate($name, $lastname, $birthday, $email, $address, $city, $password, $repassword);
            if($valid == "success"){
                $sql = "INSERT INTO `User` (`name`, `lastname`, `birthday`, `email`, `address`, `city`, `password`, `repassword`) VALUES('$name', '$lastname', '$birthday', '$email', '$address', '$city', '$password', '$repassword');";
                mysqli_query($conn, $sql);
            }
            // if($valid == 'success'){
            //     $sql = "INSERT INTO `User` (`name`, `lastname`, `birthday`, `email`, `address`, `city`, `password`, `repassword`) 
            //         VALUES ('$name', '$lastname', '$birthday', '$email', '$address', '$city', '$password', '$repassword');";
            //     mysqli_query($conn, $sql);
            // }  
        break;
    }
    // $data = $_POST['data'];
    // if($data){
    //     echo "Success";
    // }
    function validate($name, $lastname, $birthday, $email, $address, $city, $password, $repassword){
        if(strlen($name) < 1){
            return "Wrong your name!";
        }
        if(strlen($lastname) < 1){
            return "Wrong your lastname!";
        }
        if(strlen($birthday) < 1){
            return "Wrong your birthday!";
        }
        if(strlen($email) < 1){
            return "Wrong your email!";
        }
        if(strlen($address) < 1){
            return "Wrong your address!";
        }
        if(strlen($city) < 1){
            return "Wrong your city!";
        }
        if(strlen($password) < 1){
            return "Your password must be 6 too!";
        }
        if(strlen($repassword) < 1){
            return "Your re-password must be 6 too!";
        }
        if($password != $repassword){
            return "Your password is not correct";
        }
        if($password == $repassword){
            return "success";
        }
    }
    // $res = array("Success" => true, "message" => $data);

    // echo json_encode($res);
?>