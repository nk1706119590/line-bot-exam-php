<?php

$Setup_Server = '127.0.0.1:4040'; //ex.123.234.456.789

$Setup_User = 'nan'; // name userdb

$Setup_Pwd = '1234'; // pass

$Setup_Database = 'testtest'; //name tbl db

mysql_connect($Setup_Server,$Setup_User,$Setup_Pwd);

mysql_query("use $Setup_Database");

mysql_query("SET NAMES UTF8");

?>
