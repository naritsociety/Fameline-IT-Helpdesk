<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?

include"connect.php";
$sql="select * from job";
$result=mysql_db_query($dbname,$sql);
$number=mysql_num_rows($result);
$no=1;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>IT Dep.</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div align="right"><a href="../admin/admin.html">สำหรับเจ้าหน้าที่เจ้านั้น</a>	</div>
  <h1><a href="#">helpdesk<span></span></a></h1>
  
</div>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h2 class="title">Helpdesk Job</h2>
	  <div class="entry">
				<p><?
//include"admin_menu.php";
if($number<>0){
echo"
<P><B>รายการ</B></P>
<TABLE WIDTH='530' BORDER=1>
	<TR BGCOLOR=#E8E8E8>
	<TD><CENTER><B>Job ID</B></CENTER></TD>
	<TD><CENTER><B>Detail</B></CENTER></TD>
	<TD><CENTER><B>Name</B></CENTER></TD>
	<TD><CENTER><B>Department</B></CENTER></TD>
<TD><CENTER><B>Tel</B></CENTER></TD>
<TD><CENTER><B>Status</B></CENTER></TD>
	
	</TR>";
while($rs=mysql_fetch_array($result)){
	$job_id=$rs[job_id];
	$job_id=sprintf("Q%07d",$job_id);
	$job_detail=$rs[job_detail];
	$job_fname=$rs[job_fname];
	$ref_dep_id=$rs[ref_dep_id];
	$job_tel=$rs[job_tel];
	$job_status=$rs[job_status];
	echo"
	<TR>
	<TD><A HREF=\"admin_order_view.php?job_id=$job_id\" TARGET=\"_blank\">$job_id</A></TD>
	<TD>$job_detail</TD>
	<TD>$job_fname</TD>
	<TD><CENTER>$ref_dep_id</CENTER></TD>
	<TD>$job_tel</TD>
	<TD>$job_status</TD>
		</TR>
	</TR>";
	$no++;
}
echo"</TABLE>";
mysql_close();
}
?></p>
                <p><a href="add_job.php">New Job</a></p>
		  </div>
		</div>
		</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Menu</h2>
				<ul>
					<li><a href="../news/index.php">IT News</a></li>
				  <li><a href="../forum/webboard.php">Webboard</a></li>
				  <li><a href="list_job.php" target="_self">Helpdesk Job</a></li>
				  <li><a href="#">Inventory</a></li>
					
					
			  </ul>
			</li>
			
		</ul>
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end sidebar -->
</div>
<!-- end page -->
<div id="footer">
	<p id="legal">Copyright (c)  <a href="http://www.fameline.com">Fameline Product</a> | Designed by <a href="http://www.fameline.com" target="_blank">IT Fameline Product</a></p>
	<p id="links">&nbsp;</p>
</div>
</body>
</html>
