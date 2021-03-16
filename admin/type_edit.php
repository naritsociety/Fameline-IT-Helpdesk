<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}

$id_edit=$_GET[id_edit];

include"connect.php";
$sql="select * from type where type_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);

$type_id=$rs[type_id];
$type_name=$rs[type_name];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>IT Dep.</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->

<div id="header">
	<div align="right">
    <? include "menu.php"; ?>
    </div>
    <h1><a href="#">helpdesk<span></span></a></h1>
</div>
<br>
<table width="800" height="52" border="0" align="center">
 
 
  <tr>
    <td height="26" colspan="2" valign="top" background="images/bg_in.jpg"><table width="98%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        
        <td width="76%" valign="top">
    <FORM NAME="forml"METHOD="post"ACTION="type_edit2.php">
	แก้ไขประเภทของปัญหา
	<INPUT TYPE="text"NAME="name"VALUE="<?=$type_name;?>">
	<INPUT TYPE="submit"NAME="submit"VALUE="submit">
	<INPUT NAME="id_edit"TYPE="hidden"VALUE="<?=$id_edit;?>">
</FORM></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td><?
	$sql1="select * from type";
$result1=mysql_db_query($dbname,$sql1);
$number=mysql_num_rows($result1);
$no=1;
	
if($number <> 0){
	echo"<P><B>แสดงประเภทปัญหา</B></P>
	<TABLE width='100%' BORDER='1'>
	<TR BGCOLOR='#E8E8E8'>
	<TD><CENTER><B>Type.ID</B></CENTER></TD>
	<TD><CENTER><B>Type.Name</B></CENTER></TD>
	<TD><CENTER><B>Type.Edit</B></CENTER></TD>
	<TD><CENTER><B>Type.Delete</B></CENTER></TD>
	</TR>";
	While($rs=mysql_fetch_array($result1)){
	$type_id=$rs[type_id];
	$type_name=$rs[type_name];
	echo"
		<TR>
		<TD><CENTER>$type_id</CENTER></TD>
		<TD>$type_name</TD>
		<TD><A HREF=\"type_edit.php?id_edit=$type_id\"><center>edit</center</A></TD>
		<TD><A HREF=\"type_delete.php?id_del=$type_id\"
		Onclick=\"return confirm('ยืนยันลบประเภทสินค้า $type_name ออกจากระบบ')\"><center>delete</center></A></TD>
		</TR>";
	$no++;
	}
	echo"</TABLE>";
	mysql_close();
}
?></td>
  </tr>
</table>
<br>
<br>
<div id="footer">
	<p id="legal">Copyright (c)  <a href="http://www.fameline.com">Fameline Product</a> | Designed by <a href="http://www.fameline.com" target="_blank">IT Fameline Product</a></p>
	<p id="links">&nbsp;</p>
</div>
</body>
</html>