<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
$name=$_POST[name];
if($name==''){
	echo"<H3>ERROR:��سҡ�͡���ͻ������Թ���</H3>";
	exit();
}
include "connect.php";
$sql="INSERT INTO type VALUES(null,'$name')";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=type\">";

}else{
	echo"<H3>ERROR:	�������ö�����������Թ�����</H3>";
}
mysql_close();
?>
