<?php 
  require("session_inside.php");
 
?><style type="text/css">
<!--
body{
background-color:#ECF5FF;
font-size:12px;}
.list{
	padding-left:0px;
}
.list ul{
padding-left:0px;}
.list ul li{
font-size:12px;
color:#333333;
border-bottom: 1px solid #666;
line-height:25px;	
background-color: #F2F2DB;
list-style:none;

}
.list .aid{
width:30px;
text-align:right;
padding-right:10px;}
.list .q{
width:480px;
height:26px;
margin-left:2px;
overflow:hidden;	
}
.list .an{
width:70px;
margin-left:10px;
overflow:hidden;	background-color: #E0E0A3;	
text-align:center;
}
.list .more{
width:12px;
margin-left:0px;
padding-right:10px;
}
.list .dell{
	width:50px;

	text-align:right;
	padding-right:5px;
}
.dell a{
width:50px;
	background-image: url(images/warning.gif);
	background-repeat: no-repeat;
	background-position: left;}
.dell a:hover{
background-color:#CCFF00;

}
.list .ytu{
color:#FF0000;
width:40px;}
.list .wutu{
width:40px;
color:#666666;}
list .pages{
color:#000099}
.pages a{
width:30px;
border: 1px solid #999;
text-align:center;
font-size:14px;
}
.pages a:hover{
background-color:#CCFF00
}
-->
</style>
<script language="JavaScript">
<!--
function suredo(src,q)
    {
      var ret;
      ret = confirm(q);
      if(ret!=false)window.location=src;
    }
//-->
</script>
<body>
<?php
  require("../conn.php");
  require("../page.php");
  $conn=mysql_open();
  $query="select  * from veling_drive_exam order  by id desc";
  genpage($query,15);
  $result=mysql_query($query);
  $num=mysql_num_rows($result);
  echo "<div class='list'><ul>\r\n";
  while($rs=mysql_fetch_object($result))
  {
    echo "<li><span class='aid'>$rs->id </span><span class='dell'>"; 
?>
    <a href='javascript:suredo("del.php?id=<?php echo "$rs->id";?>&type=choice","确定删除?")'>删除</a></span> 
<?php 
    if ($rs->pic <>"")
      echo "<span class='ytu'>[有图]</span>";
    else echo "<span class='wutu'>[无图]</span>";
    echo "\r\n<span class='q'>$rs->question ？</span><span class='more'><img src='images/dot02.gif' border='0' alt='$rs->question'/></span><span class='an'>[答案：$rs->answer]</span><span class='an'>※$rs->operater</span></li>\r\n";
  }
  echo "<li><span class='pages'>";
  showpage();
  echo "</span></li></ul></div>";
  mysql_close($conn); 
?>
 </body>