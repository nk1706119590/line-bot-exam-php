<?php
    
    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";

    $con = mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror".mysqli_error());
    mysqli_set_charset($con,"utf8"); 

    $query = "SELECT user_id FROM register" or die("Error:" . mysqli_error()); 

    $result = mysqli_query($con, $query); 


    echo "UserID : "['userId']."<br>";
    
      
}
?>






