<?
Session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include"connect.php";

if($_REQUEST['update']=='status'){
require_once "sendmail.php";

$detail = "เรียนผู้ดูแลระบบ Helpdesk<br>มีการประเมินการทำงานจากระบบ HelpDesk<hr><br>Job ID: $_REQUEST[job_id]<br>วันที่แจ้งปัญหา: $job_date<br>ชื่อผู้แจ้ง: $job_fname&nbsp;$job_lname <br>แผนก: $dep_name <br>โทร: $job_tel<br><hr><br><font size=6 color=blue>ผลการประเมินจาก User</font><br><font size=5><b>สถานะ:</b> $_REQUEST[status] <br> <b>ความพึงพอใจ:</b> $_REQUEST[point] <br> <b>หมายเหตุ/เหตุผล:</b> $_REQUEST[detail] </font><br> <b>เข้าสู่ระบบ >></b> <a href=http://192.168.1.7/helpdesk/admin/login.php>คลิก</a>";  

$sql="update job set job_status='$_REQUEST[status]',job_point = '$_REQUEST[point]',job_note = '$_REQUEST[detail]' where job_id='$_REQUEST[id_job]'";
$result=mysql_db_query($dbname,$sql);

if($result){
$to_name      ="ผู้ใช้ระบบ HelpDesk";
$to_email      ="helpdesk@fameline.com";
$from_name      ="User Request HelpDesk";
$email_user_send  ="helpdesk@fameline.com";
$email_pass_send  ="Fameline2554";
$subject      ="แจ้งเตือน! มีการประเมินของ Job ID: $job_id";
$body_html      =$detail;
$body_text      ="Job ID $job_id Current Status: $job_status";

scriptdd_sendmail($to_name,$to_email,$from_name,$email_user_send,$email_pass_send,$subject,$body_html,$body_text);  

  echo"<script>alert('บันทึกข้อมูลเรียบร้อย');";
  echo "window.location='../index.php';</script>";
}else{

  echo"<script>alert('บันทึกข้อมูลไม่สำเร็จ!');";
  echo "history.back();</script>";
}

}

?>

<script type="text/javascript">
 function chk_status (){

  if(form1.status.value==0){

    alert('กรุณาเลือกสถานะ!');
    return false;
  }
  else if(form1.status.value=="Pending" && form1.detail.value==""){

    alert('กรุณาใส่เหตุผลด้วยครับ!');
    return false;

  }

  if(form1.point.value==""){

    alert('กรุณาเลือกผลการประเมิน!');
    return false;
  }



 } 

</script>

<h2 align="center">ทำการประเมินการทำงานของฝ่าย IT</h2>
<div align="center">
<fieldset style="width: 550px;padding: 5px;">
<form name="form1" onsubmit="return chk_status();" action="?update=status&id_job=<?php echo $_REQUEST['job_id'];?>" method="post">

<?php 
//$sql="select * from job where job_id='$id_edit'";
$sql="select job.job_id,job.job_fname,job.job_lname,job.job_detail,job.job_tel,job.job_status,job.job_remark,job.job_tel,job.email,
job.job_date,job.timerq,job.job_ans,job.job_ansn,job.job_update,job.timerp,dep.dep_name,type.type_name
from job,dep,type
where job.ref_dep_id=dep.dep_id and job.ref_type_id=type.type_id and job.job_id='$_REQUEST[job_id]'";
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
$job_status=$rs[job_status];
$timerp = date ('H:i:s');

?>

    โปรดเลือก: 
    <select name=status onchange="window.location='?job_id=<?php echo $_REQUEST['job_id'];?>&status='+this.value;">
    <option value=0>สถานะ</option>
    <option value="Complete" <?php if($_REQUEST['status']=='Complete'){echo 'selected';}?>>Complete</option>
    <option value="Pending" <?php if($_REQUEST['status']=='Pending'){echo 'selected';}?>>Not Complete</option>
    </select>
    <br>

<?php if($_REQUEST['status']=='Complete'){?>
<hr>

<b>ประเมินการทำงานฝ่าย IT:</b> 
<input type="radio" name="point" value="ดีมาก">ดีมาก
<input type="radio" name="point" value="ดี">ดี
<input type="radio" name="point" value="พอใช้">พอใช้
<input type="radio" name="point" value="แย่">แย่
<input type="radio" name="point" value="ควรปรับปรุง">ควรปรับปรุง

<br><br>

<div align="left">
หมายเหตุ:<br> 
<textarea name="detail" rows="3" style="width: 550px;"></textarea>
</div>

<hr>

<?php } else if($_REQUEST['status']=='Pending'){?>

<hr>

<div align="left">
เหตุผล:<br> 
<textarea name="detail" rows="3" style="width: 550px;"></textarea>
</div>

<?php } ?>

    <br><br>
    <input type=submit value="ยืนยัน"></input>
    </fieldset>

    <input type="hidden" name="job_id" value="<?php echo $code;?>">
    <input type="hidden" name="job_date" value="<?php echo $job_date;?>">
    <input type="hidden" name="job_fname" value="<?php echo $job_fname;?>">
    <input type="hidden" name="job_lname" value="<?php echo $job_lname;?>">
    <input type="hidden" name="dep_name" value="<?php echo $dep_name;?>">
     <input type="hidden" name="job_tel" value="<?php echo $job_tel;?>">
    </form> 
    </div>
   
   <br>

<table width="650" align="center"
cellpadding="0"cellspacing="0" bgcolor="#CCCCCC" style="border-bottom:1px dotted #000000;border-top:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000;">
    <tr>
      <td colspan="3" valign="top" bgcolor="#FFFFFF"><table width="236" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
        <tr>
          <td width="156" bgcolor="#FF0000"><div align="center">Status : </div></td>
          <td width="144"><div align="right">
            <input type="text" name="job_status" value="<?=$job_status?>" disabled>
            <input type="hidden" name="job_status" value="<?=$job_status?>">
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
          <td width="50%"><input name="job_fname" type="text" value="<?=$job_fname?>" size="15" readonly>
              <input name="job_lname" type="text" value="<?=$job_lname?>" size="15" readonly></td>
          <td width="14%">Job Date</td>
          <td width="22%"><input name="job_date" type="text" value="<?=$job_date?>" size="10" readonly></td>
        </tr>
        <tr>
          <td>แผนก</td>
          <td><input name="dep_name" type="text" size="30" value="<?=$dep_name?>" readonly></td>
          <td>Job No.</td>
          <td><input name="job_id" type="text" value="<?=$code?>" size="10" readonly></td>
        </tr>
        <tr>
          <td>เบอร์ติดต่อ</td>
          <td><input name="job_tel" type="text" size="10" value="<?=$job_tel?>" readonly></td>
          <td>Request Time</td>
          <td width="22%"><input name="timerq" type="text" value="<?=$timerq?>" size="10" readonly></td>
        </tr>
    <tr>
      <td>อีเมล์ผู้แจ้ง</td>
          <td><input name="email" type="text" size="30" value="<?=$email?>"></td>
          <td></td>
          <td></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="136" valign="top">ปัญหาที่เกิด</td>
      <td colspan="2" bgcolor="#CCCCCC"><textarea name="job_detail" cols="50" rows="4" readonly><?=$job_detail?>
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
      <td colspan="2"><input name="job_type" type="text"  value="<?=$type_name?>" size="30" readonly></td>
    </tr>
    <tr>
      <td valign="top">วิธีแก้ปัญหา</td>
      <td colspan="2"><textarea name="job_ans" cols="50" rows="4"><?=$job_ans?></textarea></td>
    </tr>
    <tr>
      <td valign="top">หมายเหตุ</td>
      <td colspan="2"><input name="job_remark" type="text" value="<?=$job_remark?>" size="50"></td>
    </tr>
    <tr>
      <td valign="top">ผู้ที่แก้ไขปัญหา</td>
      <td><input type="text" name="job_ansn" value="<?=$job_ansn?>" size="35" ></td>
      <td></td>
    </tr>
   <tr>
      <td>Response Time</td>
      <td colspan="2"><input name="timerp" type="text" value="<?=$timerp?>" size="10" readonly></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td colspan="3" valign="top"><div align="center"></div></td>
    </tr>

    </table>


</body>
</html>
