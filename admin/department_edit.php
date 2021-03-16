<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
?>

<?
$id_edit=$_GET[id_edit];

include"connect.php";
$sql="select * from dep where dep_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);

$dep_id=$rs[dep_id];
$dep_name=$rs[dep_name];
?>
<?
$sql1="select * from dep";
$result1=mysql_db_query($dbname,$sql1);
$number=mysql_num_rows($result1);
$no=1;
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

<table width="800" border="0" align="center">
  <tr>
   
    <td>
     <FORM NAME="forml"METHOD="post"ACTION="department_edit2.php">
	แก้ไขชื่อแผนก
	<INPUT TYPE="text"NAME="dep_name"VALUE="<?=$dep_name;?>">
	<INPUT TYPE="submit"NAME="submit"VALUE="submit">
	<INPUT NAME="id_edit"TYPE="hidden"VALUE="<?=$id_edit;?>">
</FORM>       </td>
  </tr>
  <tr>
    <td><?
if($number <> 0){
	echo"<P><B>แสดงแผนก</B></P>
	<TABLE width='100%' BORDER='1'>
	<TR BGCOLOR='#E8E8E8'>
	<TD><CENTER><B>Dep.ID</B></CENTER></TD>
	<TD><CENTER><B>Dep.Name</B></CENTER></TD>
	<TD><CENTER><B>Dep.Edit</B></CENTER></TD>
	<TD><CENTER><B>Dep.Delete</B></CENTER></TD>
	</TR>";
	While($rs=mysql_fetch_array($result1)){
	$dep_id=$rs[dep_id];
	$dep_name=$rs[dep_name];
	echo"
		<TR>
		<TD><CENTER>$dep_id</CENTER></TD>
		<TD>$dep_name</TD>
		<TD><A HREF=\"department_edit.php?id_edit=$dep_id\"><center>edit</center</A></TD>
		<TD><A HREF=\"department_del.php?id_del=$dep_id\"
		Onclick=\"return confirm('ยืนยันลบแผนก  $dep_name ออกจากระบบ')\"><center>delete</center></A></TD>
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
