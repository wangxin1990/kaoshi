<?php
session_start();
if(! isset($_SESSION['admin_user']))
{
echo "<script language=javascript>alert('���Ѿ���ʱ�����˳���½��');location='be_out.html';</script>";
}
?>