<?
Session_start();
if($sess_adminid<>session_id()){
	header("location:login.php");exit();
}
include"connect.php";
$startdate=$_POST[startdate];
$enddate=$_POST[enddate];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IT Dep.</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

</td>
  </tr>
  <style type="text/css">
<!--
body,td,th {
	color: #0000FF;
	font-size: 12px;
}
.style2 {font-size: 13px}
.style7 {font-size: 25px}
-->
  </style>
<head>
  <body>
<tr>
    <td valign="top"><table width="100%" style="border-bottom:2px dotted #000000;border-right:2px dotted #000000;border-left:2px dotted #000000;border-top:2px dotted #000000;" cellspacing="0" cellpadding="0">
      <tr>
        <td width="47%" height="35"><table width="482" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td>จากวันที่<input name="startdate" type="text" value="<?=$startdate?>" size="10" disabled>
                ถึงวันที่<input name="enddate" type="text" value="<?=$enddate?>" size="10" disabled></td>
          </tr>
          <tr>
         
		  <td>&nbsp;</td>
		  
           </tr>
        </table></td>
        <td width="15%"></td>
        <td width="38%"><div align="right"><span class="style7">Report Helpdesk Log</span></div></td>
      </tr>
    </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
      <tr>
        <td width="725">
<?
if (empty($startdate) or empty($enddate))
{
echo"Empty";
exit();
}
else
{
$objDB = mysql_select_db("$dbname");
//$sql1 = "SELECT COUNT(job_status) AS Count_status FROM job WHERE job_status='Complete'";
$strSQL="select * from job where job_date between '$startdate' and '$enddate'";
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


$strSQL .=" order by job_id ASC LIMIT $Page_Start , $Per_Page";
$objQuery = mysql_query($strSQL);

if(empty($Num_Rows)) /* ?????????????????????? */
{
echo"<center><br>StartDate <b>$startdate</b> EndDate <b>$enddate IT WRONG!!<b> </center>";
exit();
}
else
{
?>

</td>
      </tr>
      <tr>
        <td><table width="100%" border="1" cellpadding="0" cellspacing="0" bgcolor="#999999">
          <tr>
            <td width="5%"><div align="center" class="style2">ID</div></td>
            <td width="30%"><span class="style2">รายละเอียดงาน</span></td>
            <td width="30%"><span class="style2">การดำเนินงาน/แก้ไข</span></td>
            <td width="7%"><div align="center" class="style2">ชื่อผู้แจ้ง</div></td>
            <td width="7%"><div align="center"><span class="style2">สถานะ</span></div></td>
            <td width="7%"><div align="center"><span class="style2">กลุ่มปัญหา</span></div></td>
            <td width="14%"><div align="center"><span class="style2">Remark</span></div></td>
          </tr>
        </table>
          <?
		  $i=0;
		 
while($objResult = mysql_fetch_array($objQuery))
{
$i++; 
if($i%2==0) 
{ 
$bg = "#CCCCCC"; 
} 
else
{ 
$bg = "#E4E4E4"; 
}
$job_date = $objResult["job_date"];
$y=substr($job_date,2,2);
$m=substr($job_date,5,2);
$d=substr($job_date,8,2);
$job_id = $objResult["job_id"];
$code=sprintf("$y$m%05d",$job_id);
?>

        <table width="100%" style="border-bottom:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000;" cellpadding="0" cellspacing="0">

          <tr>
            <td width="5%" style="border-right:1px dotted #000000;" rowspan="2"><div align="center"><?=$code;?></div></td>
            <td width="30%" style="border-right:1px dotted #000000;" valign="top"><?=$objResult["job_detail"];?></td>
            <td width="30%" style="border-right:1px dotted #000000;" valign="top"><?=$objResult["job_ans"];?></td>
            <td width="7%" style="border-right:1px dotted #000000;"><div align="center"><?=$objResult["job_fname"];?></div></td>	
            <td width="7%" style="border-right:1px dotted #000000;"><div align="center"><?=$objResult["job_status"];?></div></td>
            <td width="7%" style="border-right:1px dotted #000000;">
             <? 
				 $type_id = $objResult["ref_type_id"]; 
			?>
			<?  
				$strSQL3 ="SELECT*FROM type where type_id='$type_id' ";
				$objQuery3 = mysql_query($strSQL3);
				$Num_Rows3 = mysql_num_rows($objQuery3);
	
			while($objResult3 = mysql_fetch_array($objQuery3))

			{
			?>
				<div align="center"><?=$objResult3["type_name"];?></div></td>
			<?	
			}
			?>		
            <td width="14%"><?=$objResult["job_remark"];?></td>
          </tr>
          <tr bgcolor="">          </tr>
        </table>
        <?
}

?></td>
      </tr>

      <tr>
        <td height="37"><div align="center"><span class="style11">
        </span>
            <table width="100%" style="border-bottom:1px dotted #000000;border-right:1px dotted #000000;border-left:1px dotted #000000;" cellspacing="0" cellpadding="0">
              <tr>
                <td height="20"><div align="center"><span class="style11">Total </span><?=$Num_Rows;?>
                    <span class="style11"> Record : </span><?=$Num_Pages;?>
                    <span class="style11">Page :</span>
                    <?
if($Prev_Page)
{
echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&startdate=$startdate&enddate=$enddate'></a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
if($i != $Page)
{
echo "[<a href='$_SERVER[SCRIPT_NAME]?Page=$i&startdate=$startdate&enddate=$enddate'>$i</a>]";
}
else
{
echo "<b> $i </b>";
}
//}
if($Page!=$Num_Pages)
{
echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&startdate=$startdate&enddate=$enddate'></a> ";
}

 
?>
                    <?
}
}

} mysql_close();
?>
</div></td>
              </tr>
            </table><br>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>

<br>
<tr><td valign="top">

</body>
</html>
