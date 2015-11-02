<!--php上传文件代码,很好用的 --><?php 
$uptypes=array('image/jpg', //上传文件类型列表 
'image/jpeg', 
'image/png', 
'image/pjpeg', 
'image/gif', 
'image/bmp', 
'image/x-png'); 
$max_file_size=5000000; //上传文件大小限制, 单位BYTE 
$destination_folder="upload/"; //上传文件路径 
$imgpreview=1; //是否生成预览图(1为生成,其他为不生成); 
$imgpreviewsize=1/2; //缩略图比例 
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
<input type="submit" value="单击上传" style="width:80;border:1 solid #9a9999; font-size:12px; background-color:#ffffff;" size="17"><br>
</form> 

<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  { 
    if (!is_uploaded_file($_FILES["upfile"][tmp_name])) 
    //是否存在文件 
    { 
      echo "<font color='red'>文件不存在！</font>"; 
      exit; 
    } 
    $file = $_FILES["upfile"]; 
    if($max_file_size < $file["size"]) 
    //检查文件大小 
    { 
       echo "<font color='red'>文件太大！</font>"; 
       exit; 
    } 
    if(!in_array($file["type"], $uptypes)) 
    //检查文件类型 
    { 
       echo "<font color='red'>只能上传图像文件或Flash！</font>"; 
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
        echo "<font color='red'>同名文件已经存在了！</a>"; 
        exit; 
    } 
    if(!move_uploaded_file ($filename, $destination)) 
    { 
        echo "<font color='red'>移动文件出错！</a>"; 
        exit; 
    }
    $pinfo=pathinfo($destination); 
    $fname=$pinfo[basename]; 
    if($imgpreview==1) 
    { 
         echo "<br/><a href=\"".$destination."\" target='_blank'><img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize); 
         echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\" border='0'></a>"; 
         echo '<input name="img" type="hidden" value="'.$destination.'" id="img"/>';    
         echo'<script> parent.document.form1.img.value=document.getElementById("img").value;</script>';    
    } 
  } 
?> 
</center> 
</body> 
</html> 
