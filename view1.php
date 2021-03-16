<?
$id_edit=$_POST[id_edit];
$job_detail=$_POST[job_detail];

include"connect.php";
$sql="update job set job_detail='$job_detail' where job_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
if($result){
	echo"<H3>Complete</H3>";
}else{
	echo"<H3>ERROR:</H3>";
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