<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD><TITLE><? require("config.php");echo "$websit_name ";?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=gbk">

<style type="text/css">
<!--
body{
background-color:#D7E4FF;
font-size:14px;}
.box {
	border: 1px solid #034D8F;
	margin-top:5px;
	padding:10px;
	color:#000033;
	line-height:25px;
	font-size:12px;
	background-color:#FFFFFF;	
	background-image: url(images/bg.gif);
	background-repeat: no-repeat;
	background-position: right center;
	
}
.box img{
}
label{ margin-right:20px;
font-size:14px;}
.t{
background-color:#E1F4FF;
width:98%;
padding-left:10px;
}
.lb{
float:left;
margin-right:20px;
margin-left:5px;

}
.abcd{
width:100%;
padding-top:10px;}
input {
	font-family: "Verdana", "Arial", "Helvetica", "sans-serif";
	font-size: 14px;;
	border: 1px solid #999;
	height: 20px;padding-top:3px;
	background-color:#F8D9FD
}
.da{
margin-top:5px;
width:98%;
	border-bottom: 1px solid #EFEFEF;
	background-color:#FFFFBB;
	padding-top:5px;
	padding-bottom:5px;
	padding-left:10px;
	font-size:14px;
}.panda{
width:98%;
	border-bottom: 1px solid #EFEFEF;
	background-color:#FFFFBB;
	padding-top:5px;
	padding-bottom:5px;
	padding-left:10px;
}
.ti{
	font-size: 16px;
	color:#990000;
	height:40px;
	font-weight: bold;
	float:right;
	margin-right:40px;
}
.dati{
	width:100%;
	height:25px;
	padding-left:22px;
	padding-top:7px;
	font-size:14px;
	background-image: url(images/nav-bg.gif);
	background-repeat: repeat-x;
	color:#FFFFFF
}.nav{
	border : 1px solid #333;
	display:block;
	width:20px;
	height:20px;
	float:left;
margin-left:1px;
margin-top:1px;
text-align:center;
} 
-->
</style>

<body>
<a name='head'></a>

<script src="inc/timer.js" type="text/javascript"></script>
<?php
  require("conn.php");
  $conn=mysql_open();
  $query="select  * from veling_drive_exam order by Rand() limit 5 ";
  $result=mysql_query($query);
  echo "<form id='form1' name='form1' method='post' action='get_result.php?action=check_and_get_answer&data_transport=Xml'><div class='dati'>一、单项选择题(每题1分,共5题)  </div>";
  $num=0;
  if (mysql_num_rows($result)==0)
    echo "<p/><p/><p/><font color='red' font-size='18px'>题库里面有没有选择题数据！请先添加选择题 </font><p/><p/><br>";
  while($rs=mysql_fetch_object($result))
  {
  	 $num++;
     echo "<a name='c$num'></a><div class=box><span class='t'>$num    、$rs->question</span><br /><input type='hidden' name='id$num' value='$rs->id' />\r\n<div class='abcd'>";
     echo "<div class='lb'>";
     if (($rs->a)<>"")
       echo "A ：$rs->a <br>";
     if (($rs->b)<>"")
       echo "B ：$rs->b <br>";
     if (($rs->c)<>"")
       echo "C ：$rs->c <br>";
     if (($rs->d)<>"")
       echo "D ：$rs->d <br>";
     echo "</div>";
     if ($rs->pic<>"")
       echo "<img src='$rs->pic '  border='0' height='100px'/><br>";
     echo "</div> <div class='da'>请选择答案：";
     if (($rs->a)<>"")
       echo " <label>A:<input type='radio' name='$num'  id='$rs->id' value='A' /></label>";
     if (($rs->b)<>"")
       echo "  <label>B:<input type='radio' name='$num' id='$rs->id' value='B' /></label>";
     if (($rs->c)<>"")
       echo "  <label>C:<input type='radio' name='$num' id='$rs->id' value='C' /></label>";
     if (($rs->d)<>"")
       echo " <label>D:<input type='radio' name='$num' id='$rs->id' value='D' /></label>";
       echo " </div></div>";
  }
  echo "<div class='dati'>二、 判断题(每题1分,共".$jnumber."题)</div>";
  $sql="select  * from veling_drive_judge order by Rand() limit ".$jnumber."";
  $list=mysql_query($sql);
  if (mysql_num_rows($list)==0)
    echo "<p/><p/><p/><font color='red' font-size='18px'>题库里面有没有判断题数据！请先添加选择题 </font><p/><p/><br>";
  $nu=0;
  while($rs=mysql_fetch_object($list))
  {
  	 $nu++;
     echo "<a name='j$nu'></a><div class=box><span class='t'>$nu    、$rs->question</span><br />";
     if ($rs->pic<>"")
       echo "<img src='$rs->pic '  border='0' height='100px'/><br>";
       echo "<input type='hidden' name='jj$nu' value='$rs->id' /><div class='panda'>请判断 ：
             <label>正确:<input type='radio' name='j$nu'  id='$rs->id' value='1' /></label>
             <label>错误:<input type='radio' name='j$nu'  id='$rs->id' value='0' /></label> 
             </div></div>";
  }
  echo "<input type='hidden' name='maxnum' value='$num' /><input type='hidden' name='maxnu' value='$nu' /><br/><input name='Submit' value='交卷查看答案' type='submit' class='ti'  /></form>";
  mysql_close($conn);
  echo "<br />";
  echo "<br> <br>练习时间：";
  print (date("Y年m月d日",time()));  
?>


<a name='foot'></a>
<DIV style="background-color:#FFCCFF; font-size:14px; 
BORDER-RIGHT: #efefef 0px solid; PADDING-RIGHT: 1px; BORDER-TOP: #efefef 0px solid; PADDING-LEFT: 1px; RIGHT: 10px; FILTER: Alpha(opacity=95); FLOAT: right; PADDING-BOTTOM: 1px; BORDER-LEFT: #efefef 0px solid; WIDTH: 270px; PADDING-TOP: 1px; BORDER: #efefef 1px solid; POSITION: absolute; ; TOP: expression(documentElement.scrollTop+documentElement.clientHeight-this.clientHeight-105); opacity: 0.95">选择题快速到达：<a href='#head' class='nav'>顶</a>
<?php 
  $n=1;
  while ($n<=5)
  {
    echo "<a href='#c$n' class='nav'>$n</a>";
    $n++;
  }
?><hr/><br/>
判断题快速到达：
<?php 
   $m=1;
   while ($m<=$jnumber)
   {
      echo "<a href='#j$m' class='nav'>$m</a>";
      $m++;
   }
?>
<a href='#foot' class='nav'>底</a></DIV> 
<div style="width:0px; height:0px; overflow:hidden;"><script language="javascript" type="text/javascript" src="http://js.users.51.la/2517556.js"></script>
<noscript><a href="http://www.51.la/?2517556" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/2517556.asp" style="border:none" /></a></noscript></div>
</body>
</HTML>