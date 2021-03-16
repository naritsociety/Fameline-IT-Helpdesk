<?
$user=$_POST[user];
$pass=$_POST[pass];
if	($user=="admin" and $pass=="fl2554"){
	session_start();
	session_register("sess_adminid");
	$sess_adminid=session_id();
	Header("Location:home.php");
}else {
$code_error="<FONT COLOR=\"red\">Invalid Username/Password</FONT>";
session_register("code_error");
header("location: login.php");
}

?> 
 
