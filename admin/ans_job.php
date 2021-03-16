<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
$id_edit=$_POST[id_edit];
$job_ans=$_POST[job_ans];
$job_ansn=$_POST[job_ansn];
$job_type=$_POST[job_type];
$job_remark=$_POST[job_remark];
$detail = "<table width=750 align=left
cellpadding=0cellspacing=0 bgcolor=#CCCCCC style=border-bottom:1px dotted #000000;border-top:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000;>
    <tr>
      <td colspan=3 valign=top bgcolor=#FFFFFF><table width=236 border=0 align=right cellpadding=0 cellspacing=0 bgcolor=#FF0000>
        <tr>
          <td width=156 bgcolor=#FF0000><div align=center>Status : </div></td>
          <td width=144  bgcolor=#999999><div align=left>&nbsp;$job_status
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><strong>User</strong></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><table width=100% style=border-bottom:1px dotted #000000;border-top:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000; cellpadding=1 cellspacing=1>
        <tr>
          <td width=14%>ชื่อ - สกุล</td>
          <td width=50%>$job_fname&nbsp;$job_lname</td>
          <td width=14%>Job Date</td>
          <td width=22%>$job_date</td>
        </tr>
        <tr>
          <td>แผนก</td>
          <td>$dep_name</td>
          <td>Job No.</td>
          <td>$job_id</td>
        </tr>
        <tr>
          <td>เบอร์ติดต่อ</td>
          <td>$job_tel</td>
          <td>Job Time</td>
          <td width=22%>$timerq</td>
        </tr>
		<tr>
		  <td>อีเมล์ผู้แจ้ง</td>
          <td>$email</td>
          <td></td>
          <td></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width=136 valign=top>ปัญหาที่เกิด</td>
      <td colspan=2 bgcolor=#CCCCCC><textarea name=job_detail cols=50 rows=4 readonly>$job_detail</textarea></td>
    </tr>
    <tr>
      <td valign=top>&nbsp;</td>
      <td width=300>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><hr style=border:2px #000000;></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><strong>IT</strong></td>
    </tr>
    <tr>
      <td valign=top>สาเหตุของปัญหา</td>
      <td colspan=2><textarea name=job_ans cols=50 rows=4 disabled>$job_type</textarea></td>
    </tr>
    <tr>
      <td valign=top>วิธีแก้ปัญหา</td>
      <td colspan=2><textarea name=job_ans cols=50 rows=4 disabled>$job_ans</textarea></td>
    </tr>
    <tr>
      <td valign=top>หมายเหตุ</td>
      <td colspan=2><textarea name=job_ans cols=50 rows=4 disabled>$job_remark</textarea></td>
    </tr>
    <tr>
      <td valign=top>ผู้ที่ตอบปัญหา</td>
      <td><input type=text name=job_ansn value=$job_ansn disabled></td>
      <td>&nbsp;</td>
    </tr>
	<tr>
      <td valign=top>Response Time</td>
      <td><input type=text name=job_ansn value=$timerp disabled></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
    </tr>
    </table>";




    $detail2 = "<table width=750 align=left
cellpadding=0cellspacing=0 bgcolor=#CCCCCC style=border-bottom:1px dotted #000000;border-top:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000;>
    <tr>
      <td colspan=3 valign=top bgcolor=#FFFFFF><table width=236 border=0 align=right cellpadding=0 cellspacing=0 bgcolor=#FF0000>
        <tr>
          <td width=156 bgcolor=#FF0000><div align=center>Status : </div></td>
          <td width=144  bgcolor=#999999><div align=left>&nbsp;$job_status
          </div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><strong>User</strong></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><table width=100% style=border-bottom:1px dotted #000000;border-top:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000; cellpadding=1 cellspacing=1>
        <tr>
          <td width=14%>ชื่อ - สกุล</td>
          <td width=50%>$job_fname&nbsp;$job_lname</td>
          <td width=14%>Job Date</td>
          <td width=22%>$job_date</td>
        </tr>
        <tr>
          <td>แผนก</td>
          <td>$dep_name</td>
          <td>Job No.</td>
          <td>$job_id</td>
        </tr>
        <tr>
          <td>เบอร์ติดต่อ</td>
          <td>$job_tel</td>
          <td>Job Time</td>
          <td width=22%>$timerq</td>
        </tr>
    <tr>
      <td>อีเมล์ผู้แจ้ง</td>
          <td>$email</td>
          <td></td>
          <td></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width=136 valign=top>ปัญหาที่เกิด</td>
      <td colspan=2 bgcolor=#CCCCCC><textarea name=job_detail cols=50 rows=4 readonly>$job_detail</textarea></td>
    </tr>
    <tr>
      <td valign=top>&nbsp;</td>
      <td width=300>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><hr style=border:2px #000000;></td>
    </tr>
    <tr>
      <td colspan=3 valign=top bgcolor=#CCCCCC><strong>IT</strong></td>
    </tr>
    <tr>
      <td valign=top>สาเหตุของปัญหา</td>
      <td colspan=2><textarea name=job_ans cols=50 rows=4 disabled>$job_type</textarea></td>
    </tr>
    <tr>
      <td valign=top>วิธีแก้ปัญหา</td>
      <td colspan=2><textarea name=job_ans cols=50 rows=4 disabled>$job_ans</textarea></td>
    </tr>
    <tr>
      <td valign=top>หมายเหตุ</td>
      <td colspan=2><textarea name=job_ans cols=50 rows=4 disabled>$job_remark</textarea></td>
    </tr>
    <tr>
      <td valign=top>ผู้ที่ตอบปัญหา</td>
      <td><input type=text name=job_ansn value=$job_ansn disabled></td>
      <td>&nbsp;</td>
    </tr>
  <tr>
      <td valign=top>Response Time</td>
      <td><input type=text name=job_ansn value=$timerp disabled></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan=3>
      <div align=left><font size=5 color=green><b>*กรุณาทำการ Update สถานะ และ ประเมินการทำงานของฝ่าย IT
      <a href=http://192.168.1.7/helpdesk/admin/update_status.php?job_id=$id_edit>คลิก</a>
      </b></font></div>
      </td>
    </tr>
    </table>
    <br>
    ";
	
include"connect.php";
require_once "sendmail.php";
$sql="update job set job_ans='$job_ans',job_ansn='$job_ansn',job_update=CURDATE(),timerp='$timerp',job_remark='$job_remark' where job_id='$id_edit'";
$result=mysql_db_query($dbname,$sql);
if($result){
$to_name			="ผู้ใช้ระบบ HelpDesk";
$to_email			=$_REQUEST['email'];
$to_email2			="helpdesk@fameline.com";
$from_name			="User Request HelpDesk";
$email_user_send	="helpdesk@fameline.com";
$email_pass_send	="Fameline2554";
$subject			="แจ้งเตือน! มีการเปลี่ยนแปลงสถานะของ Job ID: $job_id";
$body_html			=$detail;
$body_html2      =$detail2;
$body_text			="Job ID $job_id Current Status: $job_status";

scriptdd_sendmail($to_name,$to_email,$from_name,$email_user_send,$email_pass_send,$subject,$body_html2,$body_text);
scriptdd_sendmail($to_name,$to_email2,$from_name,$email_user_send,$email_pass_send,$subject,$body_html,$body_text);

	echo"<H3>Complete</H3>";
}else{
	Echo"<H3>ERROR:Sorry</H3>";
}
Mysql_close();
?>
<html>
<head>
</head>
<body>
<table width="100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="right"><a href="javascript: self.close ()">close</a></div></td>
  </tr>
</table>
</body>
</html>