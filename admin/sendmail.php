<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
### INCLUDE PHPMAILER ����� ###
require_once('../class.phpmailer.php');

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

if($mail==false){
	echo "Send Email Error";
	}

}
### FUNCTION SEND MAIL ####


?>
