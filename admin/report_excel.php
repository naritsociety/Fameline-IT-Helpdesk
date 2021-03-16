<?php
session_start();

header("Content-Type: application/vnd.ms-excle");
header("Content-Disposition: attachment; filename=รายงานสรุปการแจ้งซ่อม.xls");

include "../connect.php";
?>

<!DOCTYPE HTML>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<style type="text/css">
.main{ background-color:#999999; padding:5px; font-size:20px;}
.td1{ background-color:#3C3; padding:5px;font-size:18px;}
.td2{ background-color:#F93; padding:5px;font-size:16px;}
.td3{ background-color:#6F9; padding:5px;font-size:18px;}
</style>   
</head>
<body>

<?php 
if(!$_REQUEST['all']){
    ?>

<h4 align="left" class="text-primary">&nbsp;<b>ออกรายงานสรุปการแจ้งซ่อม</b><br>&nbsp;ระหว่างวันที่: <?php echo $_REQUEST['startdate'].' - '.$_REQUEST['enddate'];?></h4>

<?php } else {?>

<h4 align="left" class="text-primary">&nbsp;<b>ออกรายงานสรุปการแจ้งซ่อม</b><br>&nbsp;ออกรายงานทั้งหมด</h4>

<?php } ?>


<table width="100%" border="1">
                                            <thead>
                                                <tr class="td3">
                                                    <th width="auto"><div align="center">ลำดับ</div></th>
                                                    <th width="auto"><div align="center">ชื่อผู้แจ้ง</div></th>
                                                    <th width="auto"><div align="center">หน่วยงาน</div></th>
                                                    <th width="auto"><div align="center">เบอร์ติดต่อ</div></th>
                                                    <th width="auto"><div align="center">Email</div></th>
                                                    <th width="auto"><div align="center">ประเภทการซ่อม</div></th>
                                                    <th width="auto"><div align="center">รายละเอียดแจ้งซ่อม</div></th>
                                                    <th width="auto"><div align="center">วันที่แจ้งซ่อม</div></th>
                                                    <th width="auto"><div align="center">เวลาแจ้งซ่อม</div></th>
                                                    <th width="auto"><div align="center">วันที่รับเรื่อง</div></th>
                                                    <th width="auto"><div align="center">เวลาที่รับเรื่อง</div></th>
                                                    <th width="auto"><div align="center">สถานะปัจจุบัน</div></th>
                                                    <th width="auto"><div align="center">วิธีแก้ปัญหา</div></th>
                                                    <th width="auto"><div align="center">ผู้รับเรื่อง</div></th>
                                                    <th width="auto"><div align="center">หมายเหตุฝ่าย IT</div></th>
                                                    <th width="auto"><div align="center">ผลการประเมิน</div></th>
                                                    <th width="auto"><div align="center">หมายเหตุ</div></th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php

if(!$_REQUEST['all']){ 

//query ้อมูลตามต่ละเดือน  
$sql = "select * from job j , dep d , type t where j.ref_dep_id = d.dep_id && j.ref_type_id = t.type_id && Date_Format(j.job_date,'%Y-%m-%d') between '$_REQUEST[startdate]' and '$_REQUEST[enddate]' order by j.job_id desc";

}

else {

$sql = "select * from job j , dep d , type t where j.ref_dep_id = d.dep_id && j.ref_type_id = t.type_id order by j.job_id desc";

}

$sql=mysql_db_query($dbname,$sql);

$rows = mysql_num_rows($sql);

$i = 1;

while ($show = mysql_fetch_assoc($sql)){


?>
                  <tr>
                  <th width="auto"><div align="center"><?php echo $i++;?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_fname'].' '.$show['job_lname'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['dep_name'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_tel'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['email'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['type_name'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_detail'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_date'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['timerq'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_update'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['timerp'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_status'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_ans'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_ansn'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_remark'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_point'];?></div></th>
                                                    <th width="auto"><div align="center"><?php if($show['job_note']==''){echo 'ไม่ระบุ';}else {echo $show['job_note'];}?></div></th>
                  </tr>

          <?php } ?>

<?php 
if(!$_REQUEST['all']){ 
$sql2 = "select count(job_status) as total1 from job where job_status = 'Complete' && Date_Format(job_date,'%Y-%m-%d') between '$_REQUEST[startdate]' and '$_REQUEST[enddate]'";
}
else {
$sql2 = "select count(job_status) as total1 from job where job_status = 'Complete'";

}

$sql2=mysql_db_query($dbname,$sql2);
$show2 = mysql_fetch_assoc($sql2);


if(!$_REQUEST['all']){ 
$sql3 = "select count(job_status) as total2 from job where job_status = 'Pending' && Date_Format(job_date,'%Y-%m-%d') between '$_REQUEST[startdate]' and '$_REQUEST[enddate]'";
}
else {
$sql3 = "select count(job_status) as total2 from job where job_status = 'Pending'";
}

$sql3=mysql_db_query($dbname,$sql3);
$show3 = mysql_fetch_assoc($sql3);

$percent = ($show2['total1'] - $show3['total2']) / $rows;
$percent = $percent*100;

?>         

          <tr><td colspan="16" align="left"><h4><b>สรุป:</b> จำนวนผู้แจ้งซ่อม: <font color="orange"><?php echo number_format($rows,0);?></font> | Complete: <font color="blue"><?php echo number_format($show2['total1'],0);?></font> | Pending: <font color="red"><?php echo number_format($show3['total2'],0);?></font> | คิดเป็น  <font color="green"><?php echo number_format($percent,2);?></font> % </h4></td></tr>
          
          
            </tbody>
            </table>


</body>
</html>

