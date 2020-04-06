<?php

    //สร้างการเชื่อมต่อกับฐานข้อมูล
    $servername = "localhost";
    $username = "warawat";
    $password = "lailerd";
    $db = "runrena";
    
    //เขื่อมต่อ
    $conn = mysqli_connect($servername, $username, $password, $db);
?>