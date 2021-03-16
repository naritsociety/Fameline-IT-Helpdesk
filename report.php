<?php include "connect.php";?>

                    <div class="panel panel-primary">

                    <h3 align="center"><b>รายงานข้อมูลการแจ้งซ่อม</b></h3>

<div class="alert" align="center">
    <form action="" method="get">
      เดือน: 
     <select name="m">
     <?php $month = array ('โปรดเลือก','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
     foreach ($month as $i => $value){
     ?>
     <option value="<?php echo sprintf("%02d",$i);?>"><?php echo $month[$i];?></option>
     <?php } ?>
     </select>
     
     
      ปี: 
      
      <select name="y">
     <?php 
     $year = date ('Y')+543;
     for ($i=2565;$i>=2550;$i--){
     ?>
     <option value="<?php echo $i;?>"<?php if($i==$year){echo 'selected';}?>><?php echo $i;?></option>
     <?php } ?>
     </select>

      <input type="submit" class="btn btn-primary" value="ออกรายงาน">

      หรือ 

      <input type="radio" name="all"> ทั้งหมด

    </form>
</div>
					 
</body>
</html>

