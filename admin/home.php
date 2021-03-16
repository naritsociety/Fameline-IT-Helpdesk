<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<META HTTP-EQUIV="Refresh"  CONTENT="60;URL=home.php">
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

<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
<tr>
        <td width="613" height="19">
<?
include"connect.php";
$objDB = mysql_select_db("$dbname");
if($_REQUEST['status']==""){
$strSQL="select * from job";
}
else {
  $strSQL="select * from job where job_status = '$_REQUEST[status]'";
}
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page =10; // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
$Num_Pages =($Num_Rows/$Per_Page)+1;
$Num_Pages = (int)$Num_Pages;
}


$strSQL .=" order by job_id desc LIMIT $Page_Start , $Per_Page";
$objQuery = mysql_query($strSQL);

if(empty($Num_Rows)) /* ?????????????????????? */
{
echo"<center>Empty</center>";
exit();
}
else
{
?></td>
        <td width="615">
        <div align="right">
<form action="" method="get">
Sort by status: <select name="status" required> 
<option value="Pending"<?php if($_REQUEST['status']=='Pending'){echo 'selected';}?>>Pending</option>
<option value="Complete"<?php if($_REQUEST['status']=='Complete'){echo 'selected';}?>>Complete</option>
</select>  
<input type="submit" name="" value="Search">
</form>

        </div></td>
    </tr>
      <tr>
        <td colspan="2"><table width="100%" border="1" cellpadding="0" cellspacing="0" bgcolor="#999999">
          <tr>
            <td width="8%"><div align="center">Job.ID</div></td>
            <td width="27%"><div align="center">Job.Detail</div></td>
            <td width="7%"><div align="center">UserName</div></td>
            <td width="9%"><div align="center">Department</div></td>
            <td width="8%"><div align="center">Tel</div></td>
			      <td width="8%"><div align="center">Email</div></td>
            <td width="9%"><div align="center">Job_Date</div></td>
            <td width="7%"><div align="center">Owner</div></td>
            <td width="9%"><div align="center">Job.status</div></td>
             <td width="8%"><div align="center">Job.Del</div></td>
          </tr>
        </table>
          <?	 
while($objResult = mysql_fetch_array($objQuery))
{
$job_date = $objResult["job_date"];
$y=substr($job_date,2,2);
$m=substr($job_date,5,2);
$d=substr($job_date,8,2);
$job_id = $objResult["job_id"];
$code=sprintf("$y$m%05d",$job_id);
$job_detail=$objResult["job_detail"];
$job_status=$objResult["job_status"];
?>

          
        <table width="100%" style="border-bottom:1px dotted #000000;" cellpadding="0" cellspacing="0">

          <tr onMouseOver="this.style.backgroundColor='cccccc';" onMouseOut="this.style.backgroundColor='ffffff';">
            <td width="8%"><div align="center"><?=$code?></div></td>       
            <?
            echo substr("<td><a href=\"javascript:NewWindow('view.php?id_edit=$job_id','acepopup','680','550','center','front');\">$job_detail",0,200)."...</a></td>";
			?>
            <td width="9%"><div align="center"><?=$objResult["job_fname"];?></div></td>
            <td width="9%">
			 <? 
				 $dep_id = $objResult["ref_dep_id"]; 
			?>
			<?  
				$strSQL3 ="SELECT*FROM dep where dep_id='$dep_id' ";
				$objQuery3 = mysql_query($strSQL3);
				$Num_Rows3 = mysql_num_rows($objQuery3);
	
			while($objResult3 = mysql_fetch_array($objQuery3))

			{
			?>
		    <div align="center"><?=$objResult3["dep_name"];?></div></td>
			<?	
			}
			?>		
            <td width="8%"><div align="center"><?=$objResult["job_tel"];?></div><div align="center"></div></td>
			<td width="8%"><div align="center"><?=$objResult["email"];?></div><div align="center"></div></td>
            <td width="9%"><div align="center"><?=$objResult["job_date"];?></div><div align="center"></div></td>  
            <td width="7%"><div align="center"><?=$objResult["job_ansn"];?></div></td>
  			<?
            echo"
			<td width=\"9%\"><center><a href=\"javascript:NewWindow('view1.php?id_edit=$job_id','acepopup','300','200','center','front');\">$job_status</a></center></td>
            <TD width=\"8%\"><center><A HREF=\"delete.php?id_del=$job_id\"
            Onclick=\"return confirm('Delete Job $job_id Now')\">Del</A></center></TD>
			";
 			?>
            
          </tr>
        </table>
        <?
}

?></td></tr>

      <tr>
        <td height="55" colspan="2"><div align="center"><span class="style11"><hr>
              </span> <br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><span class="style11">Total </span>
                  <?= $Num_Rows;?>
                    <span class="style11"> Record : </span>
                  <?=$Num_Pages;?>
                    <span class="style11">Page :</span>
                  <?
if($Prev_Page)
{
echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&startdate=$startdate&enddate=$enddate&status=$_REQUEST[status]'></a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)
{
echo "[<a href='$_SERVER[SCRIPT_NAME]?Page=$i&startdate=$startdate&enddate=$enddate&status=$_REQUEST[status]'>$i</a>]";
}
else
{
echo "<b> $i </b>";
}
//}
if($Page!=$Num_Pages)

{
echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&startdate=$startdate&enddate=$enddate&status=$_REQUEST[status]'></a> ";
}

 
?>
                  <?
}
}
mysql_close();
?>
                </div></td>
              </tr>
            </table>
          <br>
        </div></td>
    </tr>
    </table>
<br>
<div id="footer">
	<p id="legal">Copyright (c)  <a href="http://www.fameline.com">Fameline Product</a> | Designed by <a href="http://www.fameline.com" target="_blank">IT Fameline Product</a></p>
	<p id="links">&nbsp;</p>
</div>

</body>
</html>
