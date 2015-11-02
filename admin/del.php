<?
  require("session_inside.php");
  require("../conn.php");
  $conn=mysql_open();
  $type=$_GET[type];
  $id=$_GET[id];
  switch ($type)
  {
  	case 'judge': 
  	    $query="delete   from veling_drive_judge where id='$id'";$bcurl='judge_list.php';
    break;
    case 'choice':
    	$query="delete   from veling_drive_exam  where id='$id'";$bcurl='Questions_list.php';
    break;
    case 'adminuser':
    	$query="delete   from veling_drive_adminuser  where id='$id'";$bcurl='user_admin.php';
    break;
}
  $result=mysql_query($query);
  mysql_close($conn);
  echo "<script language=javascript>alert('É¾³ý³É¹¦£¡');location='$bcurl';</script>";
?>