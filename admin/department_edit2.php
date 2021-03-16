<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
?>

<?
$id_edit=$_POST[id_edit];
$dep_name=$_POST[dep_name];
include"connect.php";
$sql="update dep set dep_name='$dep_name' where dep_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo"<H3>แก้ไขแผนกเรียบร้อยแล้ว</H3>";
echo "><META HTTP-EQUIV=refresh CONTENT=\"0; URL=department\">";
}else{
	Echo"<H3>ERROR:ไม่สามารถแก้ไขแผนกได้้</H3>";
}
Mysql_close();
?>