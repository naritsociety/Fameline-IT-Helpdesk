<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
?>

<?

$dep_name=$_POST[dep_name];
if($dep_name==''){
	echo"<H3>ERROR:กรุณากรอกแผนก</H3>";
	exit();
}
include "connect.php";
$sql="INSERT INTO dep VALUES(null,'$dep_name')";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=department\">";

}else{
	echo"<H3>ERROR:	ไม่สามารถเพิ่มแผนกได้</H3>";
}
mysql_close();
?>
