<?php
    include_once "conn.php";

    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'GET':
            $sql = "SELECT * FROM Post;";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);

            if($result_check > 0){
                $res = array();
                while($row = mysqli_fetch_assoc($result)){   
                    $res[] = array('data' => $row['data'], 'date' => $row['date'], 'name' => $row['name'], 'lastname' => $row['lastname'], 'id' => $row['id']);                 
                }
                echo json_encode($res);
            }
        break;
        case 'POST':
            $email = $_POST['email'];
            $sql = "SELECT * FROM Post;";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);

            if($result_check > 0){
                $res = array();
                while($row = mysqli_fetch_assoc($result)){
                    if($email == (string)$row['email']){
                        $res[] = array('data' => $row['data'], 'date' => $row['date'], 'name' => $row['name'], 'lastname' => $row['lastname'], 'id' => $row['id']);                 
                    }
                }
                echo json_encode($res);
            }
        break;
    }
?>