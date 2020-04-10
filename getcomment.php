<?php
    include_once "conn.php";

    header("Access-Control-Allow-Origin: *");
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){
        case 'POST':
            $userID = $_POST["userID"];

            $sql = "SELECT * FROM Comment;";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);


            if($result_check > 0){
                $res = array();
                while($row = mysqli_fetch_assoc($result)){
                    if((string)$row['userID'] == $userID){
                        $res[] = array("data" => $row['data'], "name" => $row['name'], 
                        "lastname" => $row['lastname'], 'id' => $row['id'],
                        "url" => $row['url']);
                    }
                }
                echo json_encode($res);
            }else{
                echo "none";
            }
        break;
    }
    function getPicUser($tokenID){
        echo $tokenID;
    }
?>