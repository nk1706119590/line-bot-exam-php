<?php

    date_default_timezone_set("Asia/Bangkok");
    
    $date = date("Y-m-d");
    $time = date("H:i:s");
    
    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";
    
    $name = $_REQUEST['name'];
    $address = $_REQUEST['address'];
    $phonenumber = $_REQUEST['phonenumber'];
    $id = $_REQUEST['userid'];
    
    $connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror".mysqli_error());
    mysqli_set_charset($connect,"utf8"); 
    
    $sql = "select * from register where user_id='$id' group by user_id"; 
    /*$result = mysqli_query($connect,$sql) or die ("error".mysqli_error()); */

    if(!$resultt = $connect->query($sql)){
        die('Then was an error running the query ['. $connect->error . ']');
    }

    while($row = $resultt->fetch_assoc()){
        echo $row['user_id'] . ', ' . $row['name'] . ', ' . $row['address'] . ', ' . $row['phonenumber'] . '<br />';
    }

?>
