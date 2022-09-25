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
          <div class="col-sm-8" <h3 class="card-title">จัดการข้อมูลวัสดุ
            <a href="index.php?Node=amat"> [เพิ่มวัสดุ] </a>
            </h3>
          </div>
          <div class="col-sm-4">
            <form align=right class="form-group my-3" method="POST">
              <input type="text" placeholder="กรอกชื่อวัสดุที่ต้องการค้นหา" class="" name="material_name" size="25"></input> <input type="submit" value="ค้นหา" class="btn btn-primary btn_custom" onclick="search()">
            </form>
          </div>
        </div>
      </div>


      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>รูปภาพ</th>
              <th>รหัส</th>
              <th>ชื่อวัสดุ</th>
              <th>รายละเอียด</th>
              <th>จำนวนที่มีอยู่</th>
              <th>ประเภท</th>
              <th>ลบรายการ</th>
              <th>แก้ไขรายการ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_POST["material_name"])) {
              $material_name = $_POST["material_name"];
            }
            error_reporting(0);
            $sql = "SELECT meter.*,metertype.* FROM meter
          LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)
          WHERE ( met_name LIKE '%$material_name%' AND (meter.met_mtype='1')  )";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
              $met_id = $row['met_id'];
              $met_name = $row['met_name'];
              $met_detail = $row['met_detail'];
              $met_img = $row['met_img'];
              $met_total = $row['met_total'];
              $met_mtype = $row['met_mtype'];

              $mtype_name = $row['mtype_name'];

            ?>

              <tr>
                <td><img src="<?= $met_img; ?>" width="80"></td>
                <td><?= $met_id; ?></td>
                <td><?= $met_name; ?></td>
                <td><?= $met_detail; ?></td>
                <td><?= $met_total; ?></td>
                <td><?= $mtype_name; ?></td>
                <td>
                  <span class="badge bg-danger">
                    <a href="index.php?Node=smat&MATID=<?= $met_id; ?>" onclick="if(confirm('คุณต้องการลบรายการนี้ใช่ไหม?')) return true; else return false;">ลบ</a>
                  </span>
                </td>

                <td>
                  <span class="badge bg-warning">
                    <a href="index.php?Node=emat&MATID=<?= $met_id; ?>" onclick="if(confirm('คุณต้องการแก้ไขรายการนี้ใช่ไหม?')) return true; else return false;">แก้ไข</a>
                  </span>
                </td>


              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>