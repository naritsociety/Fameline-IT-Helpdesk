<?
$id_edit=$_GET[id_edit];

include"connect.php";
//$sql="select * from job where job_id='$id_edit'";
$sql="select job.job_id,job.job_fname,job.job_lname,job.job_detail,job.job_tel,job.job_status,job.job_remark,job.job_tel,job.email,job.ip,job.ip_team,job.pass_team,job.id_line,job.job_date,job.timerq,job.job_ans,job.job_ansn,job.job_update,job.timerp,dep.dep_name,type.type_name
from job,dep,type
where job.ref_dep_id=dep.dep_id and job.ref_type_id=type.type_id and job.job_id='$id_edit'";
//echo $sql;

$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);
$job_date=$rs[job_date];
$y=substr($job_date,2,2);
$m=substr($job_date,5,2);
$d=substr($job_date,8,2);
$timerq=$rs[timerq];
$hh=substr($timerq,2,2);
$ss=substr($timerq,5,2);
$job_id = $rs[job_id];
$code=sprintf("$y$m%05d",$job_id);
$job_fname=$rs[job_fname];
$job_lname=$rs[job_lname];
$job_detail=$rs[job_detail];
$dep_name=$rs[dep_name];
$job_update=$rs[job_update];
$timerp=$rs[timerp];
$gg=substr($timerp,2,2);
$ll=substr($timerp,5,2);
$job_ans=$rs[job_ans];
$job_ansn=$rs[job_ansn];
$type_name=$rs[type_name];
$job_remark=$rs[job_remark];
$job_tel=$rs[job_tel];
$email=$rs[email];
$ip=$rs[ip];
$ipTeam=$rs[ip_team];
$ipTeamPass=$rs[pass_team];
$idLine=$rs[id_line];
$job_status=$rs[job_status];



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IT Dep.</title>
</head>

<body text="#0000FF">

<form name="form1" method="post" action="view1.php">
  <table width="650" align="center"
cellpadding="0"cellspacing="0" bgcolor="#CCCCCC" style="border-bottom:1px dotted #000000;border-top:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000;">
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><table width="236" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
        <tr>
          <td width="156" bgcolor="#FF0000"><div align="center">Status : </div></td>
          <td width="144"><div align="right">
            <input type="text" name="job_status" value="<?=$job_status?>" disabled>
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#CCCCCC"><strong>User</strong></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#CCCCCC"><table width="100%" style="border-bottom:1px dotted #000000;border-top:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000;" cellpadding="1" cellspacing="1">
        <tr>
          <td width="14%">ชื่อ - สกุล</td>
          <td width="50%"><input name="job_fname" type="text" value="<?=$job_fname?>" size="15" disabled>
              <input name="job_lname" type="text" value="<?=$job_lname?>" size="15" disabled></td>
          <td width="14%">Job Date</td>
          <td width="22%"><input name="job_date" type="text" value="<?=$job_date?>" size="10" disabled></td>
        </tr>
        <tr>
          <td>แผนก</td>
          <td><input name="dep_name" type="text" size="30" value="<?=$dep_name?>" disabled></td>
          <td>Job No.</td>
          <td><input name="job_id" type="text" value="<?=$code?>" size="10" disabled></td>
        </tr>
        <tr>
          <td>เบอร์ติดต่อ</td>
          <td><input name="job_tel" type="text" size="10" value="<?=$job_tel?>" disabled></td>
          <td>Job Time</td>
          <td width="22%"><input name="timerq" type="text" value="<?=$timerq?>" size="10" disabled></td>
        </tr>
		    <tr>
		      <td>อีเมล์ผู้แจ้ง</td>
          <td><input name="email" type="text" size="30" value="<?=$email?>" disabled></td>
          <td>IP เครื่อง</td>
          <td width="22%"><input name="ip" type="text" value="<? if($ip==''){echo 'ไม่ระบุ';}else {echo $ip;}?>" size="20" disabled></td>
        </tr>
        <tr>
          <td>TeamViewer</td>
          <td><input name="ipTeam" type="text" size="30" value="<?=$ipTeam?>" disabled></td>
          <td>Pass Team</td>
          <td width="22%"><input name="ipTeamPass" type="text" value="<?=$ipTeamPass?>" size="20" disabled></td>
        </tr>
        <tr>
          <td>Line ID</td>
          <td><input name="idLine" type="text" size="30" value="<?=$idLine?>" disabled></td>
        </tr>

      </table></td>
    </tr>
    
    <tr>
      <td width="136" valign="top">ปัญหาที่เกิด</td>
      <td colspan="2" bgcolor="#CCCCCC"><textarea name="job_detail" cols="50" rows="4"><?=$job_detail?>
      </textarea></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td width="300">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#CCCCCC"><hr style="border:2px #000000;"></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" bgcolor="#CCCCCC"><strong>IT</strong></td>
    </tr>
    <tr>
      <td valign="top">สาเหตุของปัญหา</td>
      <td colspan="2"><input name="job_type" type="text" disabled value="<?=$type_name?>" size="30"></td>
    </tr>
    <tr>
      <td valign="top">วิธีแก้ปัญหา</td>
      <td colspan="2"><textarea name="job_ans" cols="50" rows="4" disabled><?=$job_ans?>
      </textarea></td>
    </tr>
    <tr>
      <td valign="top">หมายเหตุ</td>
      <td colspan="2"><input name="job_remark" type="text" value="<?=$job_remark?>
      " size="50" disabled></td>
    </tr>
    <tr>
      <td valign="top">ผู้ที่ตอบปัญหา</td>
      <td><input type="text" name="job_ansn" value="<?=$job_ansn?>" disabled></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td colspan="3" valign="top"><div align="center">
      <? 
	  if($job_status=="Complete")
	  {
	  echo"<input type='submit' name='submit'  value='Submit' disabled>";
	  }else{
	 echo"<input type='submit' name='submit' value='Submit'><INPUT NAME='id_edit' TYPE='hidden' VALUE='$id_edit'>";
        } ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="3" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="top"><div align="right"><a href="javascript: self.close ()">Close</a></div></td>
    </tr>
    </table>
</form>
</body>
</html>
