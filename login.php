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
                $res = array();
                while($row = mysqli_fetch_assoc($result)){
                    // $res[] = array('email' => $row['email'], 'password' => $row['password']);
                    if($email == (string)$row['email']){
                        if(md5($password) == (string)$row['password']){
                            $res[] = array('token' => $row['token']);
                        }else{
                            $res[] = array("err" => "Your password not correct!");
                        }
                    }
                }
                $res[] = array('err' => "Email not found!");
            }
            if($valid){
                $res[] = array("err" => $valid);
            }
            echo json_encode($res[0]);
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