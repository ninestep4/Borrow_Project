<?php
if (isset($_GET['DID'])) {
  $DID = $_GET['DID'];

  $sql = "SELECT * FROM meterdraw WHERE draw_id='$DID' ";
  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($res);
  $draw_id = $row['draw_id'];
  $draw_name = $row['draw_userid_draw'];
  $met_name = $row['met_name'];
  $start_borrow = $row['start_borrow'];
  $end_borrow = $row['end_borrow'];
  $draw_num = $row['draw_num'];
  $serialnumber = $row['serialnumber'];
  $unit_name = $row['unit_name'];

}
?>
<link rel="stylesheet" href="./dist/css/adminlte.css">

<div class="content-wrapper">
  <br>
  

    <!-- Main content -->


    <section class="content">
      <center>
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                
                  <h3>รายละเอียดการยืม</h3>
                
                </div>
                <div class="card-body">
                        <tr>
                            <b>ชื่อวัสดุ:</b> <?= $met_name; ?>
                            
                        </tr><br><br>
                        <b>ชื่อผู้ยืม:</b> <?= $draw_name; ?>
                        <br><br>
                        <tr>
                            <b>จำนวน:</b> <?= $draw_num;?> <?= $unit_name; ?>
                            <b>serialnumber:</b> <?= $serialnumber;?>
                        </tr><br><br>
                        <tr>
                            <b>วันที่ยืม:</b> <?= $start_borrow; ?>
                            <b>วันที่คืน:</b> <?= $end_borrow; ?>
                        </tr>
                  <!-- /.card-body -->
                </div>
                
                <!-- /.card -->
              </div>

              <div class="col-md-4">
              <a href="index.php?Node=managedraw" class="btn btn-success  " >ย้อนกลับ</a>

            </div>
             
      </center>

    </section>

    <!-- /.content -->

  

</div>