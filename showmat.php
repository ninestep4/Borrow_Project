<?php
if(!isOnline()){
  
  echo "<script>alert('กรุณาเข้าสู่ระบบก่อนการใช้งาน');window.location ='index.php?Node=pagelogin';</script>";
}
?>
<?php
if (isset($_GET['MATID'])) {
  $MATID = $_GET['MATID'];
  $sql = "DELETE FROM meter WHERE met_id='$MATID' ";
  $res = mysqli_query($con, $sql);
  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=smat">';
  exit;
}

?>

<link rel="stylesheet" href="./dist/css/adminlte.css">

<div class="content-wrapper">


  <br>
  <div class="col-md-12">

    <div class="card">

      <div class="card-header">
        <div class="row">
          <div class="col-sm-8" class="card-title">จัดการข้อมูลวัสดุทั้งหมด
            <a href="index.php?Node=amat"> [เพิ่มวัสดุ] </a>
          </div>
          <div class="col-sm-4">
            <form align=right class="form-group my-3" method="POST">
              <input type="text" placeholder="กรอกชื่อวัสดุที่ต้องการค้นหา" class="" name="material_name" size="25"></input>
              <input type="submit" value="ค้นหา" class=" btn-primary " onclick="search()">
          </div>
        </div>
      </div>

      
      <div  class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
	      <td>รหัส</td>
              <td>รูปภาพ</th>          
              <td>ชื่อวัสดุ</td>
              
              <td style="text-align:center">จำนวนที่มีอยู่</td>
              <td style="text-align:center">ประเภท</td>
              <td style="text-align:center">นำเข้า</td>
              <td style="text-align:center">แก้ไขรายการ</td>
              <td style="text-align:center">ลบรายการ</td>

            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST["material_name"])) {
              $material_name = $_POST["material_name"];
            }
            error_reporting(0);
            $sql = "SELECT meter.*,metertype.*,unit.* FROM meter
          LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)
          LEFT OUTER JOIN unit ON (meter.unit_name=unit.unit_id)
          WHERE ( met_name LIKE '%$material_name%'   ) ORDER BY met_mtype ASC";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
              $met_id = $row['met_id'];
              $met_name = $row['met_name'];
              $met_detail = $row['met_detail'];
              $met_img = $row['met_img'];
              $met_total = $row['met_total'];
              $met_mtype = $row['met_mtype'];
              $unit_name = $row['unit_name'];
              $mtype_name = $row['mtype_name'];
              $br_name = wordwrap($met_name, 85, "<br />\n");

            ?>

              <tr>

                <td><?= $met_id; ?></td>
                <td><img src="<?= $met_img; ?>" width="80"></td>                
                <td><?= $br_name; ?></td>
                
                <td style="text-align:center"><?= $met_total;?>  <?= $unit_name?></td>
                <td style="text-align:center"><?= $mtype_name; ?></td>


                <td style="text-align:center">
                    <a href="index.php?Node=import&MATID=<?= $met_id; ?>"type="button" class="btn btn-success" 
                        onclick="if(confirm('คุณต้องการนำเข้ารายการนี้ใช่ไหม?')) return true; else return false;">นำเข้า
         
                    </a>
                </td>

                <td style="text-align:center">
                    <a href="index.php?Node=emat&MATID=<?= $met_id; ?>"type="button" class="btn btn-warning" 
                        onclick="if(confirm('คุณต้องการแก้ไขรายการนี้ใช่ไหม?')) return true; else return false;">แก้ไข 
                    </a>
                </td>

                <td style="text-align:center">
                    <a href="index.php?Node=smat&MATID=<?= $met_id; ?>"type="button" class="btn btn-danger" 
                        onclick="if(confirm('คุณต้องการลบรายการนี้ใช่ไหม?')) return true; else return false;">ลบ 
                    </a>
                </td>

                
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
      

    </div>
  </div>
</div>