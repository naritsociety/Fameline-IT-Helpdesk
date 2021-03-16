<?
include"connect.php";
//$sql="select * from job where job_id='$id_edit'";
$sql="select *
from job j, dep d
where j.ref_dep_id = d.dep_id order by j.job_id desc";
$result=mysql_db_query($dbname,$sql);
$rs=mysql_fetch_array($result);
$job_date=$rs[job_date];
$email_user = $rs[email];
$ip = $rs[ip];
$ipTeam = $rs[ip_team];
$ipTeamPass = $rs[ip_team];
$ipLine = $rs[id_line];
$y=substr($job_date,2,2);
$m=substr($job_date,5,2);
$d=substr($job_date,8,2);
$timerq=$rs[timerq];
$hh=substr($timerq,2,2);
$ss=substr($timerq,5,2);
$y=substr($job_date,2,2);
$m=substr($job_date,5,2);
$job_id=sprintf("$y$m%05d",$rs[job_id]);
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
$job_remark=$rs[job_remark];
$job_tel=$rs[job_tel];
$emailHD=$rs[email];
$job_status=$rs[job_status];
$dep_name = $rs[dep_name];
/////
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
### INCLUDE PHPMAILER ����� ###
require_once('class.phpmailer.php');

### FUNCTION SEND MAIL ####

function scriptdd_sendmail($to_name,$to_email,$from_name,$email_user_send,$email_pass_send,$subject,$body_html,$body_text) {

$mail = new PHPMailer();

$mail->CharSet = "utf-8";
$mail -> From     = $email_user_send;
$mail -> FromName = $from_name;

$mail->IsSMTP();
$mail->Host = 'mail.omnis.com';
$mail->Port = 587;
$mail->SMTPAuth		= true;
//$mail->SMTPDebug	= true;
$mail->Username = $email_user_send;
$mail->Password = $email_pass_send;

$mail -> Subject	= $subject;
$mail -> Body		= $body_html;
$mail -> AltBody	= $body_text;
$mail -> IsHTML (true);
$mail -> AddAddress($to_email,$to_name);

$mail->Send();
$mail->ClearAddresses();

if($mail==true){
	echo "Send Email To Admin Successfully";
	}
	else {echo 'Send Email Error';}

}
### FUNCTION SEND MAIL ####

#### �������¡�����¡�� Function Ẻ��� #####
$to_name			="ผู้ดูแลระบบ HelpDesk";
$to_email			="helpdesk@fameline.com";
$from_name			="User Request HelpDesk";
$email_user_send	="helpdesk@fameline.com";
$email_pass_send	="Fameline2554";
$subject			="แจ้งเตือน! มีการแจ้งปัญหาจาก HelpDesk";
$body_html			="เรียนผู้ดูแลระบบ Helpdesk<br>ระบบแจ้งเตือนมีการแจ้งปัญหาจาก HelpDesk<hr><br>Job ID: $job_id<br>วันที่แจ้งปัญหา: $job_date<br>ชื่อผู้แจ้ง: $job_fname&nbsp;$job_lname <br>แผนก: $dep_name <br>โทร: $job_tel <br> IP เครื่อง: $ip <br> IP TeamViewer : $ipTeam <br> Password TeamViewer : $ipTeamPass <br> Line ID : $ipLine <hr>กรุณาดำเนินการตรวจสอบในระบบ HelpDesk อย่างเร่งด่วน!<br> Link to access >> <a href=http://192.168.1.7/helpdesk/admin/login.php>http://192.168.1.7/helpdesk/admin/login.php</a>";
$body_text			="เรียนผู้ดูแลระบบ Helpdesk ระบบแจ้งเตือนมีการแจ้งปัญหาจาก HelpDesk กรุณาดำเนินการตรวจสอบในระบบ HelpDesk อย่างเร่งด่วน";

scriptdd_sendmail($to_name,$to_email,$from_name,$email_user_send,$email_pass_send,$subject,$body_html,$body_text);


?>
