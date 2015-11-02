<?php 
$admin_user=$_POST['username'];
$admin_pass=md5($_POST['password']);
echo "$admin_user <br> $admin_pass<p>";
require("../conn.php");
$conn=mysql_open();

$sql="insert into veling_drive_adminuser(name,password) values('$admin_user','$admin_pass')";
$result=mysql_query($sql);
echo $sql;
mysql_close($conn);
echo "<script language=javascript>alert('Ìí¼Ó³É¹¦£¡');location='index.html';</script>";

?>