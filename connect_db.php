<?php

$Setup_Server = ''; //ex.123.234.456.789

$Setup_User = ''; // name userdb

$Setup_Pwd = ''; // pass

$Setup_Database = ''; //name tbl db

mysql_connect($Setup_Server,$Setup_User,$Setup_Pwd);

mysql_query("use $Setup_Database");

mysql_query("SET NAMES UTF8");

?>
