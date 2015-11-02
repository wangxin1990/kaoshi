<?php 
  require("session_inside.php");
 
?><style type="text/css">
<!--
body{
background-color:#ECF5FF;
font-size:14px;}
.inp {
margin-left:15px;
}
.su{
margin-left:100px;}
.border2 {
	border: 1px solid #D5E4F4;
		border-bottom: 1px solid #ccc;
		height:18px;

}
.border1 {
	border: 1px solid #D5E4F4;

}
.font14 {
	font-size: 14px;
	font-family: "Tahoma";
	margin-left:50px;
}
input {
	font-family: "Verdana", "Arial", "Helvetica", "sans-serif";
	font-size: 12px;
	border: 1px solid #999999;
	height: 20px;

}
.zt{
height:200px;
margin-left:10px;}
.main{
    width:860px;
	border: 1px solid #CCCCCC;
	background:#FFFFFF;
	
	margin-top:10px;
	text-align:left;
	padding-top:30px;
}
.notice{
	color:#FF0033;
	font-size: 14px;
	font-weight: bold;
}


-->
 </style>
<script laguage="javascript">
<!--
function form1_onsubmit()
{
if (document.form1.question.value=="")
    {
      alert("请输入问题！")
      document.form1.question.focus()
      return false
     }
else if(document.form1.answer.value=="")
    { 
      alert("请选择答案！")
      document.form1.answer.focus()
      return false
     }
else if(document.form1.choice_a.value=="")
    { 
      alert("至少要有两个选项内容！")
      document.form1.choice_a.focus()
      return false
     }
}
-->
</script>
 <div class="main"> 
<form id="form1" name="form1" method="post" action="post2mysql.php?action=judge" onsubmit="return form1_onsubmit()">
<p class="inp">题目：
   <input name="question" type="text" class="border2" size="60" maxlength="100"  />
 </p> 
 <p> <span class="zt">
 <input name="img" type="hidden" class="border2" size="20" maxlength="100"  />
主题图：
  </span>
 <iframe   name="frame"   frameborder="0"   width="500px"   height="200px"   scrolling="no"   src="../inc_upload.php"   >   
  </iframe> 
 </p> 
   <p class="inp">&nbsp;</p> 
<p class="inp"> 正确答案： 
  正确:
  <input name="answer" type="radio" value="1" />　　
  错误:
  <input name="answer" type="radio" value="0" /></p>
 <p> <input type="submit" name="Submit" value="添　加　试　题"  class="font14"/>
 </p>
</form>
</div>

