<?php

    date_default_timezone_set("Asia/Bangkok");
    
    $date = date("Y-m-d");
    $time = date("H:i:s");
    
    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";

    $con = mysqli_connect($serverName,$userName,$userPassword,$dbName);

    $query = "SELECT * FROM register ORDER BY id asc" or die("Error:" . mysqli_error()); 
//เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
    $result = mysqli_query($con, $query); 
// แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

    echo "<table border='1' align='center' width='500'>";
    //หัวข้อตาราง
    echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัส</td><td>ชื่อ-นามสกุล</td><td>ที่อยู่</td><td>เบอร์ติดต่อ</td></tr>";

    while($row = mysqli_fetch_array($result)) { 
      echo "<tr>";
      echo "<td>" .$row["user_id"] .  "</td> "; 
      echo "<td>" .$row["name"] .  "</td> ";  
      echo "<td>" .$row["address"] .  "</td> ";
      echo "<td>" .$row["phonenumber"] .  "</td> ";

    }
echo "</table>";
//close connection
mysqli_close($con);
?>

