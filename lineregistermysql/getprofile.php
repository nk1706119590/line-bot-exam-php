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

    $access_token = 'JOALJaFzXSS1/Iw0lRElqFUMiBHUF4LhFisSOpo9WpfG4Ju5l+o+o5yTWeYVIqOhwPafmf63J283XV1uMahQlwgdfCxzlKipJygVt7h4z9Fbt0mq+eQivXcy4jj4oyvvH8a6cp39m8SO/3I9OyLmVgdB04t89/1O/w1cDnyilFU=';
    $channelSecret = '7410da12768dbb3db2632dd64ed33a12';
    
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
            
            while($res =mysqli_fetch_array($result)){
                echo '<img style="width:100px;" src="'.$res['pic'].'" /><br><br>';
                echo "UserID : " . $id . "</br>";  
                echo "Display Name : "  . "</br>";
                echo "Name : " . $res['name'] . "</br>";
                echo "Address : " . $res['address'] . "</br>";
                echo "No : " . $res['phonenumber'] . "</br>";
            }
        } 
?>
