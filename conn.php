<?php
// functions.php

function mysql_open()
{
$mysql_server_name='localhost'; //数据库服务器
$mysql_username='root'; //数据库用户名
$mysql_password=''; //数据库密码
$mysql_database='kaoshi'; //数据库名
$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database); 

return $conn;
}
?>