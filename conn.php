<?php
// functions.php

function mysql_open()
{
$mysql_server_name='localhost'; //���ݿ������
$mysql_username='root'; //���ݿ��û���
$mysql_password=''; //���ݿ�����
$mysql_database='kaoshi'; //���ݿ���
$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database); 

return $conn;
}
?>