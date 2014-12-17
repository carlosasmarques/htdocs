<?php
mysql_connect("localhost", "root", "1234");
mysql_select_db("mysql");
$result = mysql_query("SELECT * FROM user");
$numrows = mysql_num_rows($result);
print($numrows);
?> 

