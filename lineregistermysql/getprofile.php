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
    $result = mysqli_query($connect,$sql) or die ("error".mysqli_error()); 
    $count_row = mysqli_num_rows($result);
        if($count_row < 1){        
            echo "<br/><br/>";
            echo '<h1 align="center"><font color="red">*** คุณยังไม่ได้ลงทะเบียน ***</font></h1>';
        }
        else{ 
            echo '<h1></h1>';
            echo "UserID : " . $id . "</br>";
            
            while($res =mysqli_fetch_array($result)){
                echo '<h1></h1>';
                echo "Name : " . $res['name'] . "</br>";
                echo "Address : " . $res['address'] . "</br>";
                echo "No : " . $res['phonenumber'] . "</br>";
            }
        } 
?>
