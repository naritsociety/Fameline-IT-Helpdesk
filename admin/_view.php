<?
$id_edit=$_GET[id_edit];

include"connect.php";
$sql="select job.job_id,job.job_fname,job.job_lname,job.job_detail,job.job_tel,job.job_status,job.job_type,job.job_remark,
job.job_date,job.job_ans,job.job_ansn,job.job_update,dep.dep_name from job,dep where job.ref_dep_id=dep.dep_id and job.job_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);
$job_id=$rs[job_id];
//$code=sprintf("Q%07d",$job_id);
$job_fname=$rs[job_fname];
$job_detail=$rs[job_detail];
$dep_name=$rs[dep_name];
$job_date=$rs[job_date];
$job_ans=$rs[job_ans];
$job_ansn=$rs[job_ansn];
$job_type=$rs[job_type];
$job_remark=$rs[job_remark];

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="ans_job.php">
  <table width="618"border="0" align="center"
cellpadding="0"cellspacing="0">
    <tr>
      <td width="174">Job ID</td>
      <td width="429"><input type="text" name="job_id" value="<?=$job_id?> " disabled></td>
    </tr>
    <tr>
      <td valign="top">ประเภทปัญหา</td>
      <td><textarea name="job_detail" cols="50" rows="7" readonly><?=$job_detail?>
  </textarea></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
     <td><font size=1>คำถามโดย : คุณ<?=$job_fname?>  แผนก : <?=$dep_name?> วันที่ : <?=$job_date?></font></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><hr color="#0000FF"></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td><input name="job_type" type="text" value="<?=$job_type?> " size="50"></td>
    </tr>
    <tr>
      <td valign="top">วิธีแก้ปัญหา</td>
      <td><textarea name="job_ans" cols="50" rows="7"><?=$job_ans?>
      </textarea></td>
    </tr>
    <tr>
      <td valign="top">หมายเหตุ</td>
      <td><textarea name="job_remark" cols="50" rows="3"><?=$job_remark?>
      </textarea></td>
    </tr>
    <tr>
      <td valign="top">ชื่อผู้ตอบปัญหา</td>
      <td><input type="text" name="job_ansn" value="<?=$job_ansn?>"></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td><input type="submit" name="submit"  value="Submit">
      <input type="Reset" name="reset"  value="Reset"> 
      <INPUT NAME="id_edit"TYPE="hidden"VALUE="<?=$id_edit;?>">      </td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><hr color="#0000FF"></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td><div align="right"><a href="javascript: self.close ()">close</a></div></td>
    </tr>
    </table>
</form>
</body>
</html>
