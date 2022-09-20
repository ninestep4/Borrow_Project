<?php
$sum_member = 0;
$sql1 = "SELECT COUNT(*) AS sum_member FROM member";
$res1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($res1);
$sum_member += $row1['sum_member'];


$sum_meter = 0;
$sql2 = "SELECT COUNT(*) AS sum_meter FROM meter";
$res2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_assoc($res2);
$sum_meter += $row2['sum_meter'];

$sum_md1 = 0;
$sql3 = "SELECT COUNT(*) AS sum_md1 FROM meterdraw WHERE draw_status='0' ";
$res3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_assoc($res3);
$sum_md1 += $row3['sum_md1'];

$sum_md2 = 0;
$sql4 = "SELECT COUNT(*) AS sum_md2 FROM meterdraw WHERE draw_status='1' ";
$res4 = mysqli_query($con, $sql4);
$row4 = mysqli_fetch_assoc($res4);
$sum_md2 += $row4['sum_md2'];


$sum_md3 = 0;
$sql5 = "SELECT COUNT(*) AS sum_md3 FROM meterdraw ";
$res5 = mysqli_query($con, $sql5);
$row5 = mysqli_fetch_assoc($res5);
$sum_md3 += $row5['sum_md3'];

//จำนวนวัสดุ
$sum_md4 = 0;
$sql6 = "SELECT SUM(met_total) AS sum_md4 FROM meter WHERE met_mtype = '1'";
$res6 = mysqli_query($con, $sql6);
$row6 = mysqli_fetch_assoc($res6);
$sum_md4 += $row6['sum_md4'];

$sum_md5 = 0;
$sql7 = "SELECT SUM(met_total) AS sum_md5 FROM meter WHERE met_mtype = '2'";
$res7 = mysqli_query($con, $sql7);
$row7 = mysqli_fetch_assoc($res7);
$sum_md5 += $row7['sum_md5'];

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <?php if (isOnline()) { ?>
          <div class="col-sm-6">
            <h1 class="m-0">แดชบอร์ด</h1>
          </div><!-- /.col -->
        <?php } ?>
        <div class="col-sm-6">
          <?php if (isOnline()) { ?>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
              <li class="breadcrumb-item active">แดชบอร์ด</li>
            </ol>
          <?php } ?>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <?php if (!isOnline()) { ?>

        <h1>ระบบจอง-ยืม-คืนวัสดุ ครุภัณฑ์ของคลีนิกผู้สูงอายุชุมชนบางตลาดพัฒนา 1 จังหวัดนนทบุรี<br>
          <!-- <img src="bgimg/home.jpg" width="800" class="center"> -->



          <html>
          <center>

            <body onload="javascript:slideImage();">
              <img id="imgeslide" src="bgimg/home.jpg" width="1920*1080">
              <script>
                var i = 0;

                function slideImage() {
                  var img = new Array();
                  img[0] = "bgimg/home.jpg";
                  img[1] = "bgimg/home2.jpg";
                  img[2] = "bgimg/home3.jpg";

                  var slide = document.getElementById("imgeslide");
                  slide.src = img[i];

                  var delayTime = setTimeout("slideImage()", 5000);

                  i = i + 1;
                  if (i >= 3) {
                    i = 0;
                  }
                }
              </script>

            </body>
          </center>

          </html>






        </h1>
      <?php } ?>

      <?php if (isOnline()) { ?>
        <?php if (isAdmin($_SESSION['usr'], $_SESSION['pwd'], $con)) { ?>

          <div class="row">

            <div class="col-lg-2 col-6">
              <div class="card  mb-6">


                <div class="card-header p-3 pt-6">
                  <div class="icon icon-lg icon-shape shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute  " style="background-color: #909497;">


                    <i class="ion ion-person"></i>
                  </div>
                  <div class="text-end pt-5">
                    <p class="text-sm mb-0 text-capitalize">สมาชิกในระบบทั้งหมด</p>
                    <h4 class="mb-0"><?= $sum_member; ?> คน</h4>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-lg-2 col-6">
              <div class="card  mb-6">


                <div class="card-header p-3 pt-6">

                  <div class="icon icon-lg icon-shape bg-gradient-info shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">inbox</i>
                  </div>
                  <div class="text-end pt-5">
                    <p class="text-sm mb-0 text-capitalize">จำนวนวัสดุทั้งหมด</p>
                    <h4 class="mb-0"><?= $sum_md4; ?> ชิ้น</h4>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <div class="card  mb-6">


                <div class="card-header p-3 pt-6">
                  <div class="icon icon-lg icon-shape  shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute  " style="background-color: #AF601A;">


                    <i class="material-icons opacity-10">inbox</i>
                  </div>
                  <div class="text-end pt-5">
                    <p class="text-sm mb-0 text-capitalize">จำนวนครุภัณฑ์ทั้งหมด</p>
                    <h4 class="mb-0"><?= $sum_md5; ?> ชิ้น</h4>
                  </div>
                </div>
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <div class="card  mb-6">


                <div class="card-header p-3 pt-6">
                  <div class="icon icon-lg icon-shape shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute  " style="background-color: #FFC300  ;">


                    <i class="material-icons opacity-10">schedule</i>
                  </div>
                  <div class="text-end pt-5">
                    <p class="text-sm mb-0 text-capitalize">รายการรออนุมัติ</p>
                    <h4 class="mb-0"><?= $sum_md1; ?> รายการ</h4>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-2 col-6">
              <div class="card  mb-6">


                <div class="card-header p-3 pt-6">
                  <div class="icon icon-lg icon-shape shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute  " style="background-color: #008000 ;">


                    <i class="material-icons opacity-10">done </i>
                  </div>
                  <div class="text-end pt-5">
                    <p class="text-sm mb-0 text-capitalize">รายการที่ผ่านการอนุมัติ</p>
                    <h4 class="mb-0"><?= $sum_md2; ?> รายการ</h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./col -->


            <div class="col-lg-2 col-6">
              <div class="card  mb-6">


                <div class="card-header p-3 pt-6">
                  <div class="icon icon-lg icon-shape shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute  " style="background-color: #EB1D36 ;">


                    <i class="material-icons opacity-10">close</i>
                  </div>
                  <div class="text-end pt-5">
                    <p class="text-sm mb-0 text-capitalize">รายการที่ไม่ผ่านการอนุมัติ</p>
                    <h4 class="mb-0"><?= $sum_md4; ?> รายการ</h4>
                  </div>
                </div>
              </div>
            </div>


            <!-- ./col -->
          </div>
          <!-- /.row -->


          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load("current", {
                packages: ["corechart"]
              });
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['รายการเบิกทั้งหมด', <?= $sum_md3; ?>],
                  ['รออนุมัติ', <?= $sum_md1; ?>],
                  ['อนุมัติแล้ว', <?= $sum_md2; ?>]
                ]);

                var options = {
                  title: 'สถานะการจัดการข้อมูลการเบิกวัสดุ',
                  is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
              }
            </script>
          </head>

          <body>
            <div id="piechart_3d" style="width: 800px; height: 400px;"></div>
          </body>





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
                    <th>จำนวนที่มีอยู่</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT meter.*,metertype.* FROM meter
LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)";
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
                      <td><?= $met_name; ?></td>
                      <td><?= $mtype_name; ?></td>
                      <td>

                        <?php
                        if ($met_total > 7) {
                        ?>
                          <span class="badge" style="background-color:  #DAF7A6;">
                            <font size="5">
                              <?= $met_total; ?>
                            </font>
                          </span>
                        <?php } 
                        else if ($met_total > 3 && $met_total <= 7) {
                        ?>
                          <span class="badge" style="background-color:  #FFC300 ;" >
                            <font size="5">
                              <?= $met_total; ?>
                            </font>
                          </span>
                        <?php } 
                        else{
                          ?>
                          <span class="badge bg-danger">
                            <font size="5">
                              <?= $met_total; ?>
                            </font>
                          </span>
                        <?php }
                        ?>


                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>

        <?php } else if (isUser($_SESSION['usr'], $_SESSION['pwd'], $con)) { ?>
          <hr>
          <center>
            <font size="5">ยินดีต้อนรับเข้าสู่ระบบจอง-ยืม-คืนวัสดุ ครุภัณฑ์ของคลีนิกผู้สูงอายุชุมชนบางตลาดพัฒนา 1 จังหวัดนนทบุรี<br><br>
              <html>
              <center>

                <body onload="javascript:slideImage();">
                  <img id="imgeslide" src="bgimg/home.jpg" width="1920*1080">
                  <script>
                    var i = 0;

                    function slideImage() {
                      var img = new Array();
                      img[0] = "bgimg/home.jpg";
                      img[1] = "bgimg/home2.jpg";
                      img[2] = "bgimg/home3.jpg";

                      var slide = document.getElementById("imgeslide");
                      slide.src = img[i];

                      var delayTime = setTimeout("slideImage()", 5000);

                      i = i + 1;
                      if (i >= 3) {
                        i = 0;
                      }
                    }
                  </script>

                </body>
              </center>

              </html>
            </font>
          </center>
        <?php } ?>

      <?php } ?>
      <!-- Main row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->