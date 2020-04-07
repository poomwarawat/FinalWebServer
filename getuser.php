<?php
    include_once "conn.php";

    $sql = "SELECT * FROM User;";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    if($result_check > 0){
        while($row = mysqli_fetch_assoc($result)){
            if((string)$row['email'] == "warawat555@gmail.com"){
                echo "A";
            }
            else{
                echo "Error";
            }
        }
    }else{
        echo "Error";
    }
?>