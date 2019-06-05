<?php
    date_default_timezone_set("Asia/Bangkok");

    $date = date("Y-m-d");
    $time = date("H:i:s");

    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";

    $dma = $_GET['dma'];
    $token_id = $_GET['token_id'];
    $channelid = $_GET['channelid'];
    $cns = $_GET['channelsecreat'];
    $id = $_GET['userid'];
    $uu = $_GET['name'];
    
    $connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror".mysqli_error());
    mysqli_set_charset($connect,"utf8"); 

    $sql = "select uu from tbl_register where uu='$uu'"; 
    $result = mysqli_query($connect,$sql) or die ("error".mysqli_error()); 

    $count_row = mysqli_num_rows($result);

        if($count_row < 1){        
            $query = "INSERT INTO tbl_register(user_id,name,address,tel,date,uu) VALUE ('$id', '$name','$address','$phonenumber',NOW(),'ระยอง')"; 
            $resource = mysqli_query($connect,$query) or die ("error".mysqli_error());
            
            echo "<br/><br/>";
            echo '<h1 align="center"><font color="red">*** ยินดีด้วย คุณลงทะเบียนสำเร็จแล้ว ***</font></h1>';
            echo '<h1 align="center"><font color="red"> กดที่เครื่องหมาย X มุมขวาบนเพื่อปิดหน้าต่างนี้</font></h1>'; 
        }
        else{ 
            echo '<h1 align="center"><font color="red">*** ขอโทษด้วย คุณเคยลงทะเบียนแล้ว ***</font></h1>';
            echo '<h1 align="center"><font color="red"> กดที่เครื่องหมาย X มุมขวาบนเพื่อปิดหน้าต่างนี้</font></h1>';
        } 
?>
