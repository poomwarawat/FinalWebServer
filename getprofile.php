<?php
    include_once "conn.php";

    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'POST':
            $key = $_POST["key"];

            $sql = "SELECT * FROM User;";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);

            if($result_check > 0){
                while($row = mysqli_fetch_assoc($result)){
                    if($key == $row['token']){
                        $res = array('email' => $row['email'], 'name' => $row['name'], 'lastname' => $row['lastname'],
                        'birthday' => $row['birthday'], 'id' => $row['id'], 'address' => $row['address'], 'city' => $row['city'],
                        'url' => $row['profileurl']);
                        echo json_encode($res);
                    }
                }
            }
        break;
    }
?>