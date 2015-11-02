<?php
session_start();
if(! isset($_SESSION['admin_user']))
{
echo "<script language=javascript>alert('您已经超时或者退出登陆！');location='be_out.html';</script>";
}
?>