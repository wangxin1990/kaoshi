<?php 
  require("session_inside.php");
  require("../conn.php");
  $addtime=date("Y-m-d H:m:s",time());
  $conn=mysql_open(); 
  if ($_GET[action]=='choice')
  {
     $bcurl='add.php';
     if($_POST["answer"]=="")
     {
	    echo "<script language=javascript>alert('�𰸲���Ϊ��');history.go(-1);</script>"; 
     }
     $sql="insert into veling_drive_exam(question,pic,a,b,c,d,answer,operater,addtime) values('".$_POST["question"]."','".$_POST["img"]."','".$_POST["choice_a"]."','".$_POST["choice_b"]."','".$_POST["choice_c"]."','".$_POST["choice_d"]."','".$_POST["answer"]."','".$_SESSION['admin_user']."','".$addtime."')";
  }
  elseif ($_GET[action]=='judge')
  {
      $bcurl='add_judge.php';
      $sql="insert into veling_drive_judge(question,pic,answer,operater,addtime) values('".$_POST["question"]."','".$_POST["img"]."','".$_POST["answer"]."','".$_SESSION['admin_user']."','".$addtime."')";
  }
  else  
  {
   	 echo "<script language=javascript>alert('��·������');location='be_out.html';</script>";
  }
   $result=mysql_query($sql);
   mysql_close($conn);
   echo "<script language=javascript>alert('��ӳɹ���');location='$bcurl';</script>"; 
 ?>