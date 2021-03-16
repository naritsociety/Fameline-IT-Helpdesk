<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
$id_edit=$_GET[id_edit];
include"connect.php";
$sql="select job.job_id,job.job_fname,job.job_lname,job.job_detail,job.job_tel,job.job_status,job.job_remark,job.job_tel,
job.job_date,job.job_ans,job.job_ansn,job.job_update,dep.dep_name,type.type_name
from job,dep,type
where job.ref_dep_id=dep.dep_id and job.ref_type_id=type.type_id and job.job_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);
$job_id=$rs[job_id];
$job_status=$rs[job_status];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="status_update.php">
  <table width="158"border="0" align="center"
cellpadding="0"cellspacing="5">
  
    <tr>
    <?
      if($job_status=='Hold'){
      echo"<td><input name=\"job_sta\" type=\"radio\" value=\"Hold\" checked> Hold</td>";
	  }else{
	  echo"<td><input name=\"job_sta\" type=\"radio\" value=\"Hold\"> Hold</td>";
	  }
	  ?>
    </tr>
    <tr>
     <?
      if($job_status=='Pending'){
      echo"<td><input name=\"job_sta\" type=\"radio\"  value=\"Pending\" checked>Pending</td>";
	  }else{
	   echo"<td><input name=\"job_sta\" type=\"radio\"  value=\"Pending\" >Pending</td>";
	   }
	  ?>
    </tr>
    <tr>
      
      <td><input type="submit" name="submit"  value="Submit">
        <INPUT NAME="id_edit"TYPE="hidden"VALUE="<?=$id_edit;?>">      </td>
    </tr>
    <tr>
     
      <td><div align="right"><A href="javascript: self.close ()">close</A></div></td>
    </tr>
    </table>
</form>
</body>
</html>
