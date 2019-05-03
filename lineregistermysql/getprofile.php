<?php

    date_default_timezone_set("Asia/Bangkok");
    
    $date = date("Y-m-d");
    $time = date("H:i:s");
    
    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";
    /*
    $user_id = null;

    if(isset($_GET["user_id"])){
        $user_id = $_GET["user_id"];
    }*/

    $con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

    $sql = "SELECT * FROM register ORDER BY id asc";

    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

    echo "<br/><br/>";
    echo $result["user_id"];
    echo "<br/><br/>";
    echo $result["name"];
    echo "<br/><br/>";
    echo $result["address"];
    echo "<br/><br/>";
    echo $result["phonenumber"];


mysqli_close($conn);

?>
