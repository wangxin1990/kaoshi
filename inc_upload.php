<!--php�ϴ��ļ�����,�ܺ��õ� --><?php 
$uptypes=array('image/jpg', //�ϴ��ļ������б� 
'image/jpeg', 
'image/png', 
'image/pjpeg', 
'image/gif', 
'image/bmp', 
'image/x-png'); 
$max_file_size=5000000; //�ϴ��ļ���С����, ��λBYTE 
$destination_folder="upload/"; //�ϴ��ļ�·�� 
$imgpreview=1; //�Ƿ�����Ԥ��ͼ(1Ϊ����,����Ϊ������); 
$imgpreviewsize=1/2; //����ͼ���� 
?> 
<html> 
<head> 
<title>M4U BLOG - fywyj.cn</title> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"> 
<style type="text/css">
body,td{font-family:tahoma,verdana,arial;font-size:11px;line-height:15px;background-color:white;color:#666666;margin-left:0px;
margin-top:0px;} 
strong{font-size:12px;} 
aink{color:#0066CC;} 
a:hover{color:#FF6600;} 
aisited{color:#003366;} 
a:active{color:#9DCC00;} 
table.itable{} 
td.irows{height:20px;background:url("index.php?i=dots" repeat-x bottom}</style> 
</head> 
<body> 
<center><form enctype="multipart/form-data" method="post" name="upform"> 

<input name="upfile" type="file" style="width:220;border:1 solid #9a9999; font-size:12px; background-color:#ffffff" size="10"> 
<input type="submit" value="�����ϴ�" style="width:80;border:1 solid #9a9999; font-size:12px; background-color:#ffffff;" size="17"><br>
</form> 

<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  { 
    if (!is_uploaded_file($_FILES["upfile"][tmp_name])) 
    //�Ƿ�����ļ� 
    { 
      echo "<font color='red'>�ļ������ڣ�</font>"; 
      exit; 
    } 
    $file = $_FILES["upfile"]; 
    if($max_file_size < $file["size"]) 
    //����ļ���С 
    { 
       echo "<font color='red'>�ļ�̫��</font>"; 
       exit; 
    } 
    if(!in_array($file["type"], $uptypes)) 
    //����ļ����� 
    { 
       echo "<font color='red'>ֻ���ϴ�ͼ���ļ���Flash��</font>"; 
       exit; 
    } 
    if(!file_exists($destination_folder)) 
        mkdir($destination_folder); 
    $filename=$file["tmp_name"]; 
    $image_size = getimagesize($filename); 
    $pinfo=pathinfo($file["name"]); 
    $ftype=$pinfo[extension]; 
    $destination = $destination_folder.time().".".$ftype; 
    if (file_exists($destination) && $overwrite != true) 
    { 
        echo "<font color='red'>ͬ���ļ��Ѿ������ˣ�</a>"; 
        exit; 
    } 
    if(!move_uploaded_file ($filename, $destination)) 
    { 
        echo "<font color='red'>�ƶ��ļ�����</a>"; 
        exit; 
    }
    $pinfo=pathinfo($destination); 
    $fname=$pinfo[basename]; 
    if($imgpreview==1) 
    { 
         echo "<br/><a href=\"".$destination."\" target='_blank'><img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize); 
         echo " alt=\"ͼƬԤ��:\r�ļ���:".$destination."\r�ϴ�ʱ��:\" border='0'></a>"; 
         echo '<input name="img" type="hidden" value="'.$destination.'" id="img"/>';    
         echo'<script> parent.document.form1.img.value=document.getElementById("img").value;</script>';    
    } 
  } 
?> 
</center> 
</body> 
</html> 
