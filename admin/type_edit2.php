<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
$id_edit=$_POST[id_edit];
$name=$_POST[name];
include"connect.php";
$sql="update type set type_name='$name' where type_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo"<H3>แก้ไขประเภทสินค้าเรียบร้อยแล้ว</H3>";
echo "><META HTTP-EQUIV=refresh CONTENT=\"0; URL=type\">";
}else{
	Echo"<H3>ERROR:ไม่สามารถแก้ไขประเภทสินค้าได้</H3>";
}
Mysql_close();
?>