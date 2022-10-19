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





include_once("search.php");

if (!empty($_POST)) {
  $output =  $_POST['people_name'];
}

if (isset($_POST['btsave'])) {
  $met_id = $_POST['met_id'];
  $draw_num = $_POST['draw_num'];
  $draw_date = date("d-m-Y");
  $serialnumber = $_POST['serialnumber'];
  $Name = $_POST['Name'];


  $sql1 = "SELECT * FROM meter WHERE met_id='$met_id' ";
  $res1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_assoc($res1);
  $met_total = $row1['met_total'];
  $metmtype = $row1['met_mtype'];
  $met_name = $row1['met_name'];
  $unit_name = $row1['unit_name'];

  $totaldif = $met_total - $draw_num;

  $sql2 = "UPDATE meter SET met_total='$totaldif' WHERE met_id='$met_id' ";
  $res2 = mysqli_query($con, $sql2);





  $sql3 = "INSERT INTO meterdraw (draw_id,met_mtype,draw_num,   draw_metid,draw_userid_draw,draw_userid_app,draw_date_app,draw_status,start_borrow,end_borrow,people_name,met_name,met_id,serialnumber,unit_name) 
  VALUES                         (''    ,'$metmtype','$draw_num','$met_id','$valuesearch'      ,''            ,'',           '0',        '$D_Post','$D_Postend','$Name','$met_name','$met_id','$serialnumber','$unit_name')";

  $res3 = mysqli_query($con, $sql3);
  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=managedraw">';
  exit;
}


?>




<div class="content-wrapper">
  <br>
  <form action="index.php?Node=drawmat" method="POST" enctype="multipart/form-data">

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
                    <b>รายละเอียด:</b> <?= $met_detail; ?><br>
                    <b>จำนวนที่มีอยู่ในสต็อก:</b> <?= $met_total; ?> <?= $unit_name; ?><br>
                  </font>


                  <div class="form-group">
                    <div>
                      <label for="inputName">จำนวนที่เบิก <font color="red">(กรุณาเบิกวัสดุไม่เกินที่มีในสต็อก)</font></label>
                    </div>

                    <body>
                      <br /><br />
                      <div class="container" style="width:500px;">

                        <input type="text" name="Name" id="Name" class="form-control" placeholder="ป้อนชื่อผู้มายืม" />
                        <div id="peoplename"></div>


                    </body>
                    <style>
                      ul {
                        cursor: pointer;
                      }
                    </style>

                    

                    <script>
                      $(document).ready(function() {
                        $('#Name').keyup(function() {
                          var query = $(this).val();
                          if (query != '') {
                            $.ajax({
                              url: "search.php",
                              method: "POST",
                              data: {
                                query: query
                              },
                              success: function(data) {
                                $('#peoplename').fadeIn();
                                $('#peoplename').html(data);



                              }
                            });
                          }
                        });
                        $(document).on('click', 'li', function() {
                          $('#Name').val($(this).text());
                          $('#peoplename').fadeOut();
                        });

                      });

                      if (isset($_POST["valuesearch"])) {
                        $valuesearch = $_POST["valuesearch"];
                        print_r($valuesearch);
                      }
                    </script>


                  </div>
                        <br>




                  <div class="container" style="width:500px;">

                    <?php


                    if ($met_mtype == 2) {
                    ?>
                    

                      <input type="text" name="serialnumber" id="serialnumber" class="form-control" placeholder="ป้อนserialnumber" />
                        <div id="serialnumber"></div><br>
                        <div>
                      <p>วันที่ยืม: <input type="date" value="<?php echo $D_Post ?>" name="start"></p>
                        </div>
                      <div>
                        <p>วันที่คืน: <input type="date" value="<?php echo $D_Postend ?>" name="end"></p>

                      </div>
                      <div>
                      <label for="inputName"><font color="red">(หากไม่กำหนดวันคืนไม่ต้องเลือกวันที่คืน)</font></label>
                    </div>

                    

                    <?php } ?>
                    <div>

                      <p>จำนวน: <input type="number" required  min = "0" max = "99999" name="draw_num" id="inputName" class="form-control" required value="1" style="width: 75px ;"></p>
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
      </center>

    </section>

    <!-- /.content -->

  </form>

</div>