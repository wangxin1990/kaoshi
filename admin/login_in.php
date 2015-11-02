<?php	  
  session_start(); 
  $shijian=date("Y-m-d H:i:s", time()) ;
  $f=md5($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
  $admin_user=$_POST['username'];
  $admin_pass=md5($_POST['password']);
  require("../conn.php");
  $conn=mysql_open();
  $sql="select `name`,`password` from veling_drive_adminuser where name='".$admin_user."' and password='".$admin_pass."'";
  $result=mysql_query($sql);
  $num=mysql_num_rows($result);
  if ($num>0)
   {
       echo "Login Sucess！";
	   session_register("admin_user");
       echo "<script language=javascript>location='main.php?admin_user=$admin_user&login_time=$shijian&source=$f';</script>";
   }
   else
   {
   echo "账户或者密码错误！！";
   echo "<script language=javascript>alert('账户或者密码错误，请重新登陆！');location='index.html';</script>";
   }
   mysql_close($conn);
?>