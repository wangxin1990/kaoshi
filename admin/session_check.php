<?php
session_start();
if(! isset($_SESSION['admin_user']))
{
echo "<script language=javascript>alert('���Ѿ���ʱ�����˳���½��');location='index.html';</script>";
}
?>