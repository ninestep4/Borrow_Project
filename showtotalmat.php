<?php
if(!isOnline()){
  
  echo "<script>alert('กรุณาเข้าสู่ระบบก่อนการใช้งาน');window.location ='index.php?Node=pagelogin';</script>";
}
?>
<div class="content-wrapper">
	<br>
	<div class="col-md-12">

            <div class="card">

              <div class="card-header">
                <h3 class="card-title">รายงานข้อมูลวัสดุคงเหลือ</h3>
              </div>

              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>รูปภาพ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>ประเภท</th>
                      <td>จำนวนที่มีอยู่</td>
                    </tr>
                  </thead>
                  <tbody>
<?php
$sql="SELECT meter.*,metertype.* FROM meter
LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)";
$res=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($res)) {
$met_id=$row['met_id'];
$met_name=$row['met_name'];
$met_detail=$row['met_detail'];
$met_img=$row['met_img'];
$met_total=$row['met_total'];
$met_mtype=$row['met_mtype'];

$mtype_name=$row['mtype_name'];

?>

<link rel="stylesheet" href="./dist/css/adminlte.css">

                    <tr>
                    <td><img src="<?=$met_img;?>" width="80"></td>
                    <td><?=$met_name;?></td>
                    <td><?=$mtype_name;?></td>
                    <td>

<?php
if($met_total>10){
?> 
                    <span class="badge bg-success">
                      <font size="5">
                        <?=$met_total;?> 
                      </font>       
                    </span>
<?php } else { ?>
                    <span class="badge bg-danger">
                      <font size="5">
                        <?=$met_total;?> 
                      </font>       
                    </span>
<?php } ?>


                    </td>
                    </tr>
<?php } ?>

                  </tbody>
                </table>
              </div>

            </div>
	</div>
</div>