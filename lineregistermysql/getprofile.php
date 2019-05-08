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
            $query = "INSERT INTO register(user_id,name,address,phonenumber,date) VALUE ('$id', '$name','$address','$phonenumber',NOW())"; 
            $resource = mysqli_query($connect,$query) or die ("error".mysqli_error());
            
            echo "<br/><br/>";
            echo '<h1 align="center"><font color="red">*** ยินดีด้วย คุณลงทะเบียนสำเร็จแล้ว ***</font></h1>';
            echo '<h1 align="center"><font color="red"> กดที่เครื่องหมาย X มุมขวาบนเพื่อปิดหน้าต่างนี้</font></h1>'; 
        }
        else{ 
            while($res =mysqli_fetch_array($result)){
                echo "Name : " .$res['name'];
            }
            
            echo '<h1 align="center"><font color="red">*** ขอโทษด้วย คุณเคยลงทะเบียนแล้ว ***</font></h1>';
            echo '<h1 align="center"><font color="red"> กดที่เครื่องหมาย X มุมขวาบนเพื่อปิดหน้าต่างนี้</font></h1>';
        } 
?>
