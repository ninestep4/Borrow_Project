<?php
if (isset($_GET['MATID'])) {
  $MATID = $_GET['MATID'];

  $sql = "SELECT * FROM meter WHERE met_id='$MATID' ";
  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($res);
  $met_id = $row['met_id'];
  $met_name = $row['met_name'];
  $met_detail = $row['met_detail'];
  $met_img = $row['met_img'];
  $met_total = $row['met_total'];
  $met_mtype = $row['met_mtype'];
}
?>
<link rel="stylesheet" href="./dist/css/adminlte.css">

<?php

$D_Post = date("d-m-Y");
if (!empty($_POST)) {
  $D_Post =  $_POST['start'];
}

$D_Postend = date('d-m-Y');
if (!empty($_POST)) {
  $D_Postend =  $_POST['end'];
}

if (isset($_POST['btsave'])) {
  $met_id = $_POST['met_id'];
  $draw_num = $_POST['draw_num'];
  $draw_date = date("d-m-Y");


  $sql1 = "SELECT * FROM meter WHERE met_id='$met_id' ";
  $res1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_assoc($res1);
  $met_total = $row1['met_total'];

  $totaldif = $met_total - $draw_num;

  $sql2 = "UPDATE meter SET met_total='$totaldif' WHERE met_id='$met_id' ";
  $res2 = mysqli_query($con, $sql2);





  $sql3 = "INSERT INTO meterdraw (draw_id,draw_date,draw_num,draw_metid,draw_userid_draw,draw_userid_app,draw_date_app,draw_status,start_borrow,end_borrow) VALUES ('','$draw_date','$draw_num','$met_id','$memid','','','0','$D_Post','$D_Postend')";

  $res3 = mysqli_query($con, $sql3);
  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=hisdraw">';
  exit;
}



?>




<div class="content-wrapper">
  <br>
  <form action="index.php?Node=drawmat" method="POST" enctype="multipart/form-data">

    <!-- Main content -->


    <section class="content">
      <center>
        <div class="row: center;">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">เบิกข้อมูลวัสดุ</h3>
              </div>
              <div class="card-body">

                <input type="hidden" name="met_id" value="<?= $met_id; ?>">
                <img src="<?= $met_img; ?>" width="120"><br>
                <font size="5">
                  <b>ชื่อวัสดุ:</b> <?= $met_name; ?><br>
                  <b>รายละเอียด:</b> <?= $met_detail; ?><br>
                  <b>จำนวนที่มีอยู่ในสต็อก:</b> <?= $met_total; ?> หน่วย<br>
                </font>


                <div class="form-group">
                  <div>
                  <label for="inputName">จำนวนที่เบิก <font color="red">(กรุณาเบิกวัสดุไม่เกินที่มีในสต็อก)</font></label>

                  <br>
                  <!-- <p>วันที่ยืม</p>
                  <input type="date" id="start" name="value" min="2022-01-01" max="2022-12-31" value="">
                  <br>
                   <p>วันที่คืน</p>
                  <input type="date" id="value" name="end" min="2022-01-01" max="2022-12-31" value=""> -->
                  <br>
                  </div>
                  <select id="inputStatus" name="user_name" class="form-control custom-select" required="">
                    <option selected disabled>เลือกชื่อผู้มายืม</option>


                    <?php
                    $sql = "SELECT * FROM user";
                    $res = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                      $mtype_id = $row['user_id'];
                      $mtype_name = $row['user_name'];
                    ?>
                      <option value="<?= $mtype_id; ?>"><?= $mtype_name; ?></option>

                    <?php } ?>

                  </select>
                  
                  <div>


                    <p>วันที่ยืม: <input type="date" value="<?php echo $D_Post ?>" name="start"></p>
                    <p>วันที่คืน: <input type="date" value="<?php echo $D_Postend ?>" name="end"></p>
                    <p>จำนวน: <input type="number" name="draw_num" id="inputName" class="form-control" required value="1" style="width: 75px ;"></p>
                  </div>
                  
                </div>
                <div>

                </div>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>


          <div class="col-md-1">
            <input type="submit" value="ส่งเบิก" class="btn btn-success float-right " name="btsave">

          </div>

    </section>

    <!-- /.content -->

  </form>

</div>