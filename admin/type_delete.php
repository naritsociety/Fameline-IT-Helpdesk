
<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}

$id_del=$_GET[id_del];
include"connect.php";
$sql="delete from type where type_id='$id_del'";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo"<H3>ลบประเภทสินค้าเรียบร้อยแล้ว</H3>";
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=type\">";

}else{
	Echo"<H3>ERROR:ไม่สามารถลบประเภทสินค้าได้</H3>";
}
Mysql_close();
?>

