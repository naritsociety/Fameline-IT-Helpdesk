<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
?>

<?
$id_del=$_GET[id_del];
include"connect.php";
$sql="delete from job where job_id='$id_del'";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo"<H3>Complete</H3>";
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=home\">";

}else{
	Echo"<H3>ERROR:Can't Delete</H3>";
}
Mysql_close();
?>
