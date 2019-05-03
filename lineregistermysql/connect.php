<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
    
    $serverName="1.179.246.109";
    $userName="root";
    $userPassword="cctsssystem";
    $dbName="db_uuline_test";
    
    $connect=mysqli_connect($serverName,$userName,$userPassword,$dbName)or die("connecterror".mysqli_error());
    mysqli_set_charset($connect,"utf8"); 

    if($connect)
    {
        echo "MySQL Connected";
    }
    else
    {
        echo "MySQL Connect Failed : Error : ".mysql_error();
    }

    mysql_close($connect);
?>
</body>
</html>
