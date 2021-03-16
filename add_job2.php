<?
$job_fname=$_POST[fname];
$job_lname=$_POST[lname];
$ref_dep_id=$_POST[ref_dep_id];
$job_tel=$_POST[tel];
$nameEmail=$_POST[nameEmail];
$domainEmail=$_POST[domainEmail];
$email=$nameEmail.$domainEmail;
//$email=$_POST[email];
$ip=$_POST[ip];
$ipTeam=$_POST[ipTeam];
$ipTeamPass=$_POST[ipTeamPass];
$idLine=$_POST[idLine];

$ref_type_id=$_POST[ref_type_id];
$job_detail=$_POST[detail];
/*
if($job_fname==''){
	echo"<H3>ERROR:Input Name</H3>";
	exit();
}
*/
include "connect.php";
$sql="INSERT INTO job VALUES(null,'$job_fname','$job_lname','$ref_dep_id','$job_tel','$email','$ip','$ipTeam','$ipTeamPass','$idLine','$ref_type_id','$job_detail',CURDATE(),CURTIME(),' ',' ','Pending',' ',' ',' ','','')";
//echo $sql;
$result=mysql_db_query($dbname,$sql);
if($result){
	echo "<script>";
	echo "window.open('sendmail.php' , 'mypopup' , 'nenuber=no,toorlbar=no,location=no,scrollbars=no, status=2,width=400,height=120' );";
	echo "</script>";
	echo "<META HTTP-EQUIV=refresh CONTENT=\"0; URL=index\">";

}else{
	echo"<H3>ERROR:Not Save</H3>";
}
mysql_close();
?>