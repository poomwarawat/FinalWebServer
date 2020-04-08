<?php
    include_once "conn.php";
    
    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    
    switch ($method) {
        case 'POST':
            $email = $_POST["email"];
            $password = $_POST["password"];

            $valid = validate($email, $password);
            $sql = "SELECT * FROM User;";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);

            if($result_check > 0){
                while($row = mysqli_fetch_assoc($result)){
                    if((string)$row['email'] == $email){
                        if((string)$row['password'] == md5($password)){
                            $res = array("token" => $row['token']);
                            echo json_encode($res);
                        }else if(strlen($password) > 1){
                            $res = array("err" => "Your password not correct!");
                            echo json_encode($res);
                        }
                    }else if(strlen($email) > 0){
                        echo "Email not found";
                    }
                }
            }else{
                echo "Email not found";
            }
            if($valid){
                $res = array("err" => $valid);
                echo json_encode($res);
            }
            
        break;
    }
    function validate($email, $password){

        if(strlen($email) < 1){
            return "Wrong your email!";
        }
        if(strlen($password) < 1 ){
            return "Wrong your password!";
        }
    }
    // $res = array("Success" => true, "message" => $data);

    // echo json_encode($res);
?>