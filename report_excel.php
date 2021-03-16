<?php
session_start();

header("Content-Type: application/vnd.ms-excle");
header("Content-Disposition: attachment; filename=รายงานยอดการแจ้งซ่อม.xls");

include "connect.php";
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
if(!=$_REQUEST['all']){

if($_REQUEST['m'] && $_REQUEST['y']){
$month = array ('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');  

foreach ($month as $i => $value){
    
    if($i==$_REQUEST['m']){
        $month_s = $month[$i];
        
        }

    }
    ?>

<h4 align="center" class="text-primary"><b>ประจำเดือน: <?php echo $month_s.'&nbsp;'.$_REQUEST['y'];?></b></h4>

<?php } } else {?>

<h4 align="center" class="text-primary"><b>ออกรายงานทั้งหมด</b></h4>

<?php } ?>


<table width="100%" border="1">
                                            <thead>
                                                <tr>
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

$year = $_REQUEST['y']-543;

if(!=$_REQUEST['all']){ 

//query ้อมูลตามต่ละเดือน  
$sql = mysql_query($c,"select * from job j , dep d , type t where j.ref_dep_id = d.dep_id && j.ref_type_id = t.type_id && Date_Format(j.job_date,'%m') = '$_REQUEST[m]' && Date_Format(j.job_date,'%Y') = '$year' order by j.job_id desc");

}

else {

$sql = mysql_query($c,"select * from job j , dep d , type t where j.ref_dep_id = d.dep_id && j.ref_type_id = t.type_id order by job_id desc");

}
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
                                                    <th width="auto"><div align="center"><?php echo $show['timeq'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_update'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['timep'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_status'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_ans'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_ansn'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_remark'];?></div></th>
                                                    <th width="auto"><div align="center"><?php echo $show['job_point'];?></div></th>
                                                    <th width="auto"><div align="center"><?php if($show['job_note']==''){echo 'ไม่ระุบ';}else {echo $show['job_note'];}?></div></th>
                  </tr>

          <?php } ?>

<?php 
$sql2 = mysql_query("select count(job_status) as total1 from job where job_status = 'Complete'");
$show2 = mysql_fetch_assoc($sql2);

$sql3 = mysql_query("select count(job_status) as total2 from job where job_status = 'Pending'");
$show3 = mysql_fetch_assoc($sql3);

$percent = $show2['total1'] - $show3['total2'] / $rows * 100;

?>         

          <tr><td colspan="16" align="left"><b>สรุป:</b> จำนวนผู้แจ้งซ่อม: <?php echo number_format($rows,0);?> | Complete: <?php echo number_format($show2['total1'],0);?> | Pending: <?php echo number_format($show3['total2'],0);?> | คิดเป็น  <?php echo number_format($percent,2);?> % </td></tr>
          
          
            </tbody>
            </table>


</body>
</html>

