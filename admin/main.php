<?php 
require("session_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���߿���-��������</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>

<body scroll="no">
<!--ͷ����ʼ-->
<DIV class=top>
<DIV class=menu><SPAN class=user>�û����� 
<?  echo $_SESSION['admin_user'];
 ?> | ��ɫ�� ����Ա | <A 
href="login_out.php">�˳���¼</A> | <A 
href="http://school.itzcn.com">����ѧԺ</A></SPAN><BR>
<UL>
  <LI><A 
  href="#">���ά��</A>  </LI>
  <LI><A 
  href="#">�ȴ�����</A>  </LI>
  <LI><A 
  href="#">�ȴ�����</A>  </LI>
  <LI><A 
  href="#">�ȴ�����</A>  </LI>
  <LI><A 
  href="#">�ȴ�����</A>  </LI>
  <LI><A 
  href="#">�ȴ�����</A>  </LI>
  <LI><A 
  href="#">������Ϣ</A>  </LI>
  <LI style="DISPLAY: none"><A 
  href="http://cooljinli.gicp.net/&auml;&iquest;&iexcl;&aelig;&#129;&macr;&auml;&cedil;&shy;&aring;&iquest;&#131;/mainframe/?action=puhuo&amp;menuid=4&amp;xml2shtml&amp;%E4%BF%A1%E6%81%AF%E4%B8%AD%E5%BF%83&amp;operater=�Ž���#" 
  alt="�ҵ����">�칫����</A> </LI></UL></DIV>
<DIV class=logo><IMG height=58 src="images/logo.gif" 
width=220></DIV></DIV>
<!--ͷ������-->
<div class="line"></div>

<DIV class=main><!--�ұ������ݿ� -->
<DIV class=main_r>
<DIV class=m_top><SPAN class=topico>������ǰ����:</SPAN> </DIV>
<DIV class=main_r_main><IFRAME name=main src="be_out.html" 
frameBorder=0 width="100%" height=520></IFRAME></DIV></DIV><!--�ұ������ݿ���� -->
<DIV class=left_menu><SPAN class=left_m_top>�������</SPAN> 
<DIV id=JKDiv_2 ?>
<DIV id=JKDiv_3>
<DIV class=left_menu_main>
<OL>
  <LI><a href="Questions_list.php" target="main"><IMG src="images/edit.gif" width="48" height="48" border="0"/><SPAN>ѡ��������</SPAN> </LI>
  <LI><a href="add.php" target="main"><img src="images/edit.gif" width="48" height="48" border="0" /><SPAN>���ѡ����</SPAN></a></LI>
    <LI><a href="judge_list.php" target="main"><IMG src="images/edit.gif" width="48" height="48" border="0"/><SPAN>�ж�������</SPAN> </LI>
  <LI><a href="add_judge.php" target="main"><img src="images/edit.gif" width="48" height="48" border="0" /><SPAN>����ж���</SPAN></a></LI>
  <LI><a href="user_admin.php" target="main"><img src="images/user.gif" height="48" border="0" /><SPAN>����Ա</SPAN></a></LI>
</OL>
</DIV></DIV></DIV></DIV></DIV>
<div style="width:0px; height:0px; overflow:hidden;"><script language="javascript" type="text/javascript" src="http://js.users.51.la/2517556.js"></script>
<noscript><a href="http://www.itzcn.com" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://www.itzcn.com" style="border:none" /></a></noscript></div>
</body>
</html>
