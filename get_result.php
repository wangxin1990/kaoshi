<style type="text/css">
<!--
body{
background-color:#ECF5FF;
font-size:12px;}
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
.t{
background-color:#E1F4FF;
width:98%;
padding-left:10px;
}

.answer{
color:#FF0000;
font-size:18px;
font-weight:bolder;}
.tj{
color:#CC0000;
font-size:18px;
font-weight:bolder;
border:solid 3px #ff0000;
margin-top:55px;
padding :10px;}
.right{
	width:300px;
	height:35px;
	background-image: url(images/right.gif);
	background-repeat: no-repeat;
	background-position: right;
	text-align:center;
	color:#000099;
font-size:14px;
font-weight:bolder;
}
.worong{
	width:300px;
	height:35px;
	background-image: url(images/worong.gif);
	background-repeat: no-repeat;
	background-position: right;	text-align:center;
	color:#000099;
font-size:14px;
font-weight:bolder;
}.panda{
width:98%;
	border-bottom: 1px solid #EFEFEF;
	background-color:#FFFFBB;
	padding-top:5px;
	padding-bottom:5px;
	padding-left:10px;
}.t{
background-color:#E1F4FF;
width:98%;
padding-left:10px;
}
.box2{
width:100%}
.abcd{
float:left;
padding-left:20px;
 }.dati{
	width:100%;
	height:30px;
	padding-left:22px;
	padding-top:7px;
	font-size:14px;
	background-image: url(images/nav-bg.gif);
	background-repeat: repeat-x;
	color:#FFFFFF
}
-->
</style>
<body ><div class='dati'><?php require("config.php"); echo "一、单项选择题(每题1分,共".$cnumber."题)"; ?>  </div> 

<script language=JavaScript src="js/ad.js"></script>
<?
require("conn.php");

$conn=mysql_open();
$maxi= $_POST["maxnum"];
$i=0;
$rn=0;
while ($i<$maxi)
{$i++;

$toans= $_POST["$i"];
$idd= $_POST["id$i"];
$query="select  * from veling_drive_exam where id='$idd' ";
$result=mysql_query($query);
$rs=mysql_fetch_object($result);
echo "<div class=box><span class='t'>$i 、$rs->question ？<span class='answer'>正确答案：$rs->answer</span></span><br /><div class=box2>";
echo "<span class='abcd'>";
if (($rs->a)<>"")
echo "A ：$rs->a <br>";
if (($rs->b)<>"")
echo "B ：$rs->b <br>";
if (($rs->c)<>"")
echo "C ：$rs->c <br>";
if (($rs->d)<>"")
echo "D ：$rs->d <br> ";
echo "</span> ";
if ($rs->pic<>"")
echo "<span class='abcd'><img src='$rs->pic '  border='0' height='100px'/></span>";
echo " </div>";

if ($toans=="")
$toans="没有答该题！";

if ($rs->answer==$toans )
{$rn++;
echo "<span class='right'>您选择的是：$toans  ";}
if ($rs->answer<>$toans ){
echo "<span class='worong'>囧您选的是：$toans  ";}
echo "</span></div>";
}
$choicern=$rn;
$maxj= $_POST["maxnu"];
$j=0;
echo "<div class='dati'>二、 判断题(每题1分,共".$jnumber."题)</div>";

while ($j<$maxj)
{
$j++;

$jidd= $_POST["jj$j"];
$tohuida= $_POST["j$j"];
$sql="select  * from veling_drive_judge where id='$jidd' ";
$list=mysql_query($sql);
$rs=mysql_fetch_object($list);
$alert='不得分';
if ($rs->answer==$tohuida)
{$rn++;
$alert='得一分';}
switch($rs->answer)
{
case 1 : $ans='正确';
break;
case 0 : $ans='错误';
} 
switch($tohuida)
{
case '1' : $tans='正确';
break;
case '0' : $tans='错误';
break;
case '': $tans='您没有判断该题';
}
echo " <div class=box><span class='t'>$j 、$rs->question ？<span class='answer'>正确答案：$ans</span></span><br /><div class='panda'>";
if ($rs->pic<>"")
echo "<img src='$rs->pic '  border='0' height='100px'/><br>";
echo " 您判断的是 ：$tans<span class='answer'>$alert</span>
</div></div>";

}
print "<br><span class='tj'>共：".($maxi+$maxj)." 道题</span> <span class='tj'>答对：$rn 道</span> <span class='tj'>其中：$choicern 道选择题</span> <span class='tj'>其中：".($rn-$choicern)." 道判断题</span> <span class='tj'> 总得分： "; 
print   $rn  ;
echo "分</span><p/>";
print (date("Y年m月d日",time()));  
?></body >