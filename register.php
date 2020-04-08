<?php
    include_once "conn.php";
    
    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'POST':
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $birthday = $_POST["birthday"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];

            $valid = validate($name, $lastname, $birthday, $email, $address, $city, $password, $repassword);
            echo $valid;
            if($valid == ""){
                $sql = "SELECT email FROM User WHERE email = '$email';";
                $result = mysqli_query($conn, $sql);
                $result_check = mysqli_num_rows($result);

                if($result_check > 0){
                    echo "Email is already!";
                }else{
                    $password = md5($password);
                    $token = md5($email);
                    $sql = "INSERT INTO `User` (`name`, `lastname`, `birthday`, `email`, `address`, `city`, `password`, `token`) VALUES('$name', '$lastname', '$birthday', '$email', '$address', '$city', '$password', '$token');";
                    mysqli_query($conn, $sql);
                }
            }
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
        if(strlen($repassword) < 6){
            return "Your re-password must be 6 too!";
        }
        if($password != $repassword){
            return "Your password is not correct";
        }
        if($password == $repassword){
            return "";
        }
    }
    // $res = array("Success" => true, "message" => $data);

    // echo json_encode($res);
?>