<?php 
  require("session_inside.php"); 
?>
<style type="text/css">
body{
background-color:#ECF5FF;
font-size:12px;}
.main{
	text-align:left;
}
.main ul li{
list-style:none;
}
.main ul li span{
margin-right:20px;
text-align:center;
padding-top:5px;
margin-top:5px;
border: 1px solid #D5E4F4;
}
.id{
height:25px;
width:50px;
}
.main .name{
padding-left:10px;
width:150px;
height:25px;
}
.main .realname{
padding-left:10px;
height:25px;
width:150px;
}
.main .edit{
padding-left:10px;
height:25px;
width:150px;
}
</style>
<title>管理员</title>
</head><script language="JavaScript">
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
<div class="main"><ul>
<li><span class="id">ID号</span><span class="name">登录名</span><span class="realname">真实姓名</span><span class="edit">管理</span></li>
<?php 
  require("../conn.php");
  $conn=mysql_open();
  $query="select * from veling_drive_adminuser order by id";
  $result=mysql_query($query);
  while($rs=mysql_fetch_object($result))
  {
  echo "<li><span class='id'>$rs->id</span><span class='name'>$rs->name</span><span class='realname'>$rs->realname</span><span class='edit'>";
?>
  <a href='javascript:suredo("del.php?id=<?php echo $rs->id ;?>&type=adminuser","确定删除?")'>删除</a></span></li>
<?php
  }
  mysql_close($conn); 
?>
</ul>
</div>
</body>

