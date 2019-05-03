<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
    $host = "localhost";
    $username = "nan";
    $password = "1234";
    $objConnect = mysql_connect($host,$username,$password);

    if($objConnect)
    {
        echo "MySQL Connected";
    }
    else
    {
        echo "MySQL Connect Failed : Error : ".mysql_error();
    }

    mysql_close($objConnect);
?>
</body>
</html>