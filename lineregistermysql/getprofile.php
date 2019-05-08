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

    $con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    
    $query = "SELECT * FROM register where user_id='$id'" or die("Error:" . mysqli_error()); 
    $result = mysqli_query($con, $query); 
    $count_row = mysqli_num_rows($result);

    if($count_row > 0){
        while($res = mysqli_fetch_array($result)){
            $u_id = $res['user_id'];
            
            echo "UserID : " .$u_id];
        }  
    }
    else {
        echo "คุณยังไม่ได้ลงทะเบียน";
    }

    /*echo "<table border='1' align='center' width='500'>";
    //หัวข้อตาราง
    echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัส</td><td>ชื่อ-นามสกุล</td><td>ที่อยู่</td><td>เบอร์ติดต่อ</td></tr>";

        while($row = mysqli_fetch_array($result)) { 
          echo "<tr>";
          echo "<td>" .$row["user_id"] .  "</td> "; 
          echo "<td>" .$row["name"] .  "</td> ";  
          echo "<td>" .$row["address"] .  "</td> ";
          echo "<td>" .$row["phonenumber"] .  "</td> ";

        }
    echo "</table>";*/
//close connection
mysqli_close($con);
?>

