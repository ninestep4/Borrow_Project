<?php

if (isset($_POST['btsave'])) {
  $met_name = $_POST['met_name'];
  $met_detail = $_POST['met_detail'];
  $met_total = $_POST['met_total'];
  $met_mtype = $_POST['met_mtype'];

  $chk_pic = $_FILES['met_img']["name"];
  if ($chk_pic <> "") {
    move_uploaded_file($_FILES["met_img"]["tmp_name"], "matpic/" . $_FILES["met_img"]["name"]);
    $met_img = "matpic/" . $_FILES["met_img"]["name"];
  } else {
    $met_img = '';
  }


  $sql = "INSERT INTO meter ";
  $sql .= "(met_id,met_name,met_detail,met_img,";
  $sql .= "met_total,met_mtype)";
  $sql .= " VALUES ";
  $sql .= " ( ";
  $sql .= " '' ";
  $sql .= " ,'$met_name' ";
  $sql .= " ,'$met_detail' ";
  $sql .= " ,'$met_img' ";
  $sql .= " ,'$met_total' ";
  $sql .= " ,'$met_mtype' ";
  $sql .= " ) ";

  $res = mysqli_query($con, $sql);
  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=smat">';
  exit;
}
?>
<link rel="stylesheet" href="./dist/css/adminlte.css">



<div class="content-wrapper">
  <br>

  <form action="index.php?Node=amat" method="POST" enctype="multipart/form-data">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">เพิ่มข้อมูลวัสดุ</h3>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">ชื่อวัสดุ</label>
                <input type="text" name="met_name" id="inputName" class="form-control" required="">
              </div>

              <div class="form-group">
                <label for="inputName">รายละเอียด</label>
                <input type="text" name="met_detail" id="inputName" class="form-control" required="">
              </div>

              <div class="form-group">
                <label for="inputName">จำนวน</label>
                <input type="number" name="met_total" id="inputName" class="form-control" required="">
              </div>


              <div class="form-group">
                <label for="inputStatus">ประเภทวัสดุ</label>
                <select id="inputStatus" name="met_mtype" class="form-control custom-select" required="">
                  <option selected disabled>กรุณาเลือก</option>


                  <?php
                  $sql = "SELECT * FROM metertype";
                  $res = mysqli_query($con, $sql);
                  while ($row = mysqli_fetch_assoc($res)) {
                    $mtype_id = $row['mtype_id'];
                    $mtype_name = $row['mtype_name'];
                  ?>
                    <option value="<?= $mtype_id; ?>"><?= $mtype_name; ?></option>

                  <?php } ?>

                </select>
              </div>


              <div class="form-group">
                <label for="inputName">รูปภาพ</label>
                <input type="file" name="met_img" id="inputName" class="form-control" required="">
              </div>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="บันทึกรายการ" class="btn btn-success float-right" name="btsave">
        </div>
      </div>
      <br>
    </section>
    <!-- /.content -->

  </form>


</div>