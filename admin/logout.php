<?
	session_start();
	unset($_SESSION['sess_asminid']);
	session_destroy();
	header('location:../index.php');
?>
