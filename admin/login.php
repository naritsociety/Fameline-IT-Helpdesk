<?
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>IT Dep.</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../default.css" rel="stylesheet" type="text/css" />
<meta http-equiv="refresh" content="180;URL=home.php"> 
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
 <!--
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
</head>
<body>
<!-- start header -->

<div id="header">
	<div align="right">
    <? include "menu.php"; ?>
    </div>
    <h1><a href="#">helpdesk<span></span></a></h1>
</div>
<form name="form1" method="post" action="chlogin.php">
 : 

<table width="32%" border="0" align="center" cellpadding="0" cellspacing="5">
  <tr>
    <td height="40" colspan="2" bgcolor="#999999"><div align="center">Administrator</div></td>
    </tr>
  <tr>
    <td>UserName</td>
    <td><input type="text" name="user">
      <font color="red">*</font></td>
  </tr>
  <tr>
    <td>PassWord</td>
    <td><input type="password" name="pass">
      <font color="red">*</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? echo $code_error;?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#CCCCCC"><div align="center">
      <input type="submit" name="Submit" value="Login">
    </div></td>
    </tr>
</table>
<br>
 :
<br>
</form>
<div id="footer">
	<p id="legal">Copyright (c)  <a href="http://www.fameline.com">Fameline Product</a> | Designed by <a href="http://www.fameline.com" target="_blank">IT Fameline Product</a></p>
	<p id="links">&nbsp;</p>
</div>
</body>
</html>
