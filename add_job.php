<?
include"connect.php";
$sql="select job.job_id,job.job_fname,job.job_lname,job.job_detail,job.job_tel,job.email,
job.job_date,job.timerq,dep.dep_name from job,dep where job.ref_dep_id=dep.dep_id order by job_id desc";
$result=mysql_db_query($dbname,$sql);
while($rs=mysql_fetch_array($result)) {
	$job_id=$rs[job_id];
   $no=1;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>IT Dep.</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<script language="javascript"> 
function fncSubmit() 
{    
if(document.form1.fname.value == "")   
{ 
	alert('กรุณากรอกชื่อด้วยครับ');       
	document.form1.fname.focus(); 
	return false; 
}    
if(document.form1.lname.value == "")   
{ 
	alert('กรุณากรอกนามสกุลด้วยครับ');       
	document.form1.lname.focus(); 
	return false; 
}    
if(document.form1.ref_dep_id.value == "0") 
{ 
	alert('กรุณาเลือกแผนกด้วยครับ');       
	document.form1.ref_dep_id.focus();         
	return false; 
} 
if(document.form1.ref_type_id.value == "0") 
{ 
  alert('กรุณาเลือกประเภทของปัญหาด้วยครับ');       
  document.form1.ref_type_id.focus();         
  return false; 
}    
if(document.form1.tel.value == "")   
{ 
	alert('กรุณาใส่เบอร์ที่ติดต่อได้ด้วยครับ');       
	document.form1.tel.focus(); 
	return false; 
}
if(document.form1.email.value == "")   
{
	alert('กรุณาใส่อีเมล์ที่ติดต่อได้ด้วยครับ');       
	document.form1.email.focus(); 
	return false; 
}
if (document.form1.value!=""){	
var emailFilter=/^.+@.+\..{2,3}$/;
var str=document.form1.email.value;

if (!(emailFilter.test(str))) { 
       alert ("ท่านใส่อีเมล์ไม่ถูกต้อง");
	   return false;
}
	
}    
if(document.form1.ref_type_id.value == "0")   
{ 
	alert('กรุณาเลือกประเภทของปัญหาด้วยครับ');       
	document.form1.ref_type_id.focus(); 
	return false; 
}    
if(document.form1.detail.value == "")   
{ 
	alert('กรุณากรอกรายละเอียดของงานที่แจ้งด้วยครับ');       
	document.form1.detail.focus(); 
	return false; 
}    
          		
} 

function checkText()
{
	var elem = document.getElementById('nameEmail').value;
	if(!elem.match(/^([a-z0-9\_.-])+$/i))
	{
		alert("กรอกได้เฉพาะ a-Z, A-Z, 0-9 และ _ . - เท่านั้น");
		document.getElementById('nameEmail').value = "";
	}
}

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
<br>
<form   name="form1" method="post" action="add_job2.php" onSubmit="JavaScript:return fncSubmit();">
				  <table width="700" border="0" align="center" cellpadding="0" cellspacing="7">
        <tr>
          <td width="25%">ชื่อ - สกุล</td>
          <td width="65%"><input type="text" name="fname"/>
             <input type="text" name="lname"  /><font color="red">*</font></td>
          </tr>
        <tr>
          <td>แผนก</td>
          <td width="65%"><SELECT NAME="ref_dep_id">
	  <OPTION VALUE="0">Select</OPTION>
	  <?
		 include "connect.php";
		$sql="select * from dep";
		$result=mysql_db_query($dbname,$sql);
	  	while($rs=mysql_fetch_array($result)) {
			$dep_id=$rs[dep_id];
			$dep_name=$rs[dep_name];
			echo "<OPTION VALUE='$dep_id'>$dep_name</OPTION>";
		}
	  ?>
      </SELECT><font color="red">*</font></td>
          </tr>
        <tr>
          <td>เบอร์โทร</td>
          <td width="65%"><input type="text" size="30" name="tel" /><font color="red">*</font></td>
          </tr>
		  <tr>
          <td valign="top">อีเมล์ผู้แจ้ง</td>
          <td width="65%">
          	<!-- <input type="email" size="30" name="email" placeholder=" Email@fameline.com"/> -->
          	<input type="text" name="nameEmail" id="nameEmail" size="15" onblur="checkText();" required>
          	<input type="text" name="domainEmail" value="@fameline.com" readonly>
          	<font color="red">*</font> 
          	<br><font color="red">ใส่เมล์ในรูปแบบ Email@fameline.com เท่านั้น!!</font></td>
          </tr>
          <tr>
          <td valign="top">IP เครื่อง</td>
          <td width="65%"><input type="text" size="30" name="ip" required /><font color="red">*</font><br><font color="red">ตัวอย่างใส่ข้อมูลในรูปแบบ 192.168.1.00 เท่านั้น!!</font></td>
          </tr>
          <tr>
          <td valign="top">IP TeamViewer</td>
          <td width="65%"><input type="text" size="30" name="ipTeam" required /></td>
          </tr>
          <tr>
          <td valign="top">Password TeamViewer</td>
          <td width="65%"><input type="text" size="30" name="ipTeamPass" required /></td>
          </tr>
          <tr>
          <td valign="top">Line ID</td>
          <td width="65%"><input type="text" size="30" name="idLine" required /></td>
          </tr>
        <tr>
          <td>ประเภทของปัญหา</td>
          <td width="65%"><SELECT NAME="ref_type_id">
	  <OPTION VALUE="0">Select</OPTION>
	  <?
		 include "connect.php";
		$sql="select * from type order by type_id asc";
		$result=mysql_db_query($dbname,$sql);
	  	while($rs=mysql_fetch_array($result)) {
			$type_id=$rs[type_id];
			$type_name=$rs[type_name];
			echo "<OPTION VALUE='$type_id'>$type_name</OPTION>";
		}
	  ?>
      </SELECT><font color="red">*</font></td>
          </tr>
        <tr>
          <td valign="top">ปัญหาที่แจ้ง</td>
          <td><textarea name="detail" cols="45" rows="6" ></textarea><font color="red">*</font></td>
          </tr>

        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="submit" value="แจ้งปัญหา" />
            <input type="reset" name="reset"  value="ยกเลิก" /></td>
          </tr>
      </table>
</form>
<br>
<div id="footer">
	<p id="legal">Copyright (c)  <a href="http://www.fameline.com">Fameline Product</a> | Designed by <a href="http://www.fameline.com" target="_blank">IT Fameline Product</a></p>
	<p id="links">&nbsp;</p>
</div>

</body>
</html>
