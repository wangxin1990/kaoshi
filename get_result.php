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
<body ><div class='dati'><?php require("config.php"); echo "һ������ѡ����(ÿ��1��,��".$cnumber."��)"; ?>  </div> 

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
echo "<div class=box><span class='t'>$i ��$rs->question ��<span class='answer'>��ȷ�𰸣�$rs->answer</span></span><br /><div class=box2>";
echo "<span class='abcd'>";
if (($rs->a)<>"")
echo "A ��$rs->a <br>";
if (($rs->b)<>"")
echo "B ��$rs->b <br>";
if (($rs->c)<>"")
echo "C ��$rs->c <br>";
if (($rs->d)<>"")
echo "D ��$rs->d <br> ";
echo "</span> ";
if ($rs->pic<>"")
echo "<span class='abcd'><img src='$rs->pic '  border='0' height='100px'/></span>";
echo " </div>";

if ($toans=="")
$toans="û�д���⣡";

if ($rs->answer==$toans )
{$rn++;
echo "<span class='right'>��ѡ����ǣ�$toans  ";}
if ($rs->answer<>$toans ){
echo "<span class='worong'>����ѡ���ǣ�$toans  ";}
echo "</span></div>";
}
$choicern=$rn;
$maxj= $_POST["maxnu"];
$j=0;
echo "<div class='dati'>���� �ж���(ÿ��1��,��".$jnumber."��)</div>";

while ($j<$maxj)
{
$j++;

$jidd= $_POST["jj$j"];
$tohuida= $_POST["j$j"];
$sql="select  * from veling_drive_judge where id='$jidd' ";
$list=mysql_query($sql);
$rs=mysql_fetch_object($list);
$alert='���÷�';
if ($rs->answer==$tohuida)
{$rn++;
$alert='��һ��';}
switch($rs->answer)
{
case 1 : $ans='��ȷ';
break;
case 0 : $ans='����';
} 
switch($tohuida)
{
case '1' : $tans='��ȷ';
break;
case '0' : $tans='����';
break;
case '': $tans='��û���жϸ���';
}
echo " <div class=box><span class='t'>$j ��$rs->question ��<span class='answer'>��ȷ�𰸣�$ans</span></span><br /><div class='panda'>";
if ($rs->pic<>"")
echo "<img src='$rs->pic '  border='0' height='100px'/><br>";
echo " ���жϵ��� ��$tans<span class='answer'>$alert</span>
</div></div>";

}
print "<br><span class='tj'>����".($maxi+$maxj)." ����</span> <span class='tj'>��ԣ�$rn ��</span> <span class='tj'>���У�$choicern ��ѡ����</span> <span class='tj'>���У�".($rn-$choicern)." ���ж���</span> <span class='tj'> �ܵ÷֣� "; 
print   $rn  ;
echo "��</span><p/>";
print (date("Y��m��d��",time()));  
?></body >