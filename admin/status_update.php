<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
$id_edit=$_POST[id_edit];
$sta=$_POST[job_sta];
include"connect.php";
$sql="update job set job_status='$sta' where job_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo"<H3>Complete</H3>";
}else{
	Echo"<H3>ERROR:</H3>";
}
Mysql_close();
?>
<html>
<head></head>
<body><table width="100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="right"><a href="javascript: self.close ()">close</a></div></td>
  </tr>
</table>

</body>
</html>