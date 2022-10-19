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
  $unit_name = $row['unit_name'];
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

if (!empty($_POST)) {
  $name2app =  $_POST['name2'];
}


$today = date("Y-m-d");

if (isset($_POST['btsave1'])) {
  $met_id = $_POST['met_id'];
  $import = $_POST['import'];
  $draw_date = date("d-m-Y");


  $sql1 = "SELECT * FROM meter WHERE met_id='$met_id' ";
  $res1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_assoc($res1);
  $met_total = $row1['met_total'];
  $metmtype = $row1['met_mtype'];
  $met_name = $row1['met_name'];
  $unit_name = $row1['unit_name'];

  $totaldif = $met_total + $import;

  $sql2 = "UPDATE meter SET met_total='$totaldif' WHERE met_id='$met_id' ";
  $res2 = mysqli_query($con, $sql2);





  $sql3 = "INSERT INTO import (met_name,met_id,met_total,import_total,mem_name,date_import,unit_name) 
  VALUES ('$met_name','$met_id','$totaldif','$import','$mem_id','$today','$unit_name')";

  $res3 = mysqli_query($con, $sql3);
  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=smat">';
  exit;
}



?>




<div class="content-wrapper">
  <br>
  <form action="index.php?Node=import" method="POST" enctype="multipart/form-data">

    <!-- Main content -->


    <section class="content">
      <center>
      <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                <h3 class="card-title">เบิกข้อมูลวัสดุ</h3>
              </div>
              <div class="card-body">
                
                <input type="hidden" name="met_id" value="<?= $met_id; ?>">
                <img src="<?= $met_img; ?>" width="120"><br>
                <font size="5">
                  <b>ชื่อวัสดุ:</b> <?= $met_name; ?><br>
                  <b>จำนวนที่มีอยู่ในสต็อก:</b> <?= $met_total; ?> <?= $unit_name; ?><br>
                </font>


                <div class="form-group">
                  <div>
                    <label for="inputName">จำนวนที่นำเข้า</label>


                    <div>
                      <p>จำนวน: <input type="number" required  min = "0" max = "99999" name="import" id="inputName" class="form-control" required value="1" style="width: 75px ;"></p>
                    </div>

                  </div>

                  <div>
                    <input type="submit" value="ส่งเบิก" class="btn btn-success" name="btsave1">
                  </div>
                  
                </div>
                <!-- /.card-body -->
               
              </div>

              <!-- /.card -->
            </div>
            </div>
      </center>

    </section>

    <!-- /.content -->

  </form>

</div>