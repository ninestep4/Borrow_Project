<?php
if(!isOnline()){

  echo "<script>alert('กรุณาเข้าสู่ระบบก่อนการใช้งาน');window.location ='index.php?Node=pagelogin';</script>";
}
?>

<?php
error_reporting(0);
$D_Post = date("d-m-Y");
if (!empty($_POST)) {
  $D_Post =  $_POST['start'];
}

$D_Postend = date("d-m-Y");
if (!empty($_POST)) {
  $D_Postend =  $_POST['end'];
}

?>

<link rel="stylesheet" href="./dist/css/adminlte.css">

<section class="content">
    <form action="index.php?Node=reportout" method="POST" enctype="multipart/form-data">
        <center>
            <div class="content-wrapper">
                <br>
                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header col-md-15 mb-4">
                            


                            <div class="card-body col-md-15 mb-4"><br>
                            <p>เริ่มวันที่: <input type="date" value="<?php echo $D_Post ?>" name="start"></p> <p>ถึง: <input type="date" value="<?php echo $D_Postend ?>" name="end"></p>
                                <!-- <select name="month" id="month" class="form-control custom-select" style="width:500px;" >
                                    <option value="">เลือกเดือนที่ต้องการค้นหา</option>

                                    <option value="1">มกราคม</option>
                                    <option value="2">กุมภาพันธ์</option>
                                    <option value="3">มีนาคม</option>
                                    <option value="4">เมษายน</option>
                                    <option value="5">พฤษภาคม</option>
                                    <option value="6">มิถุนายน</option>
                                    <option value="7">กรกฎาคม</option>
                                    <option value="8">สิงหาคม</option>
                                    <option value="9">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>

                                </select> -->

                                <input type="submit" value="ค้นหา" class="  btn-success " name="searchoutM" >
                                
                                
                            </div>
                            <?php
                            error_reporting(0);

                            if ($month == 1) {
                                $M = "มกราคม";
                            };
                            if ($month == 2) {
                                $M = "กุมภาพันธ์";
                            };
                            if ($month == 3) {
                                $M = "มีนาคม";
                            };
                            if ($month == 4) {
                                $M = "เมษายน";
                            };
                            if ($month == 5) {
                                $M = "พฤษภาคม";
                            };
                            if ($month == 6) {
                                $M = "มิถุนายน";
                            };
                            if ($month == 7) {
                                $M = "กรกฎาคม";
                            };
                            if ($month == 8) {
                                $M = "สิงหาคม";
                            };
                            if ($month == 9) {
                                $M = "กันยายน";
                            };
                            if ($month == 10) {
                                $M = "ตุลาคม";
                            };
                            if ($month == 11) {
                                $M = "พฤศจิกายน";
                            };
                            if ($month == 12) {
                                $M = "ธันวาคม";
                            };
                            ?>

                            <?php
                             ob_start();
                             ?>

                            <div>
                                <?php error_reporting(0); ?>
                                <h1>รายการนำออกประจำเดือน</h1>
                                <h3><?= $M ?></h3>
                            </div>

                        </div>
                        <div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                         <td style="text-align:center" width="10%" >ลำดับ</td>
                                         <td width="20%">ชื่อวัสดุ</td>
                                         <td style="text-align:center" width="15%">จำนวนออก</td>
                                         <td style="text-align:center" width="15%">จำนวนคงเหลือ</td>
                                         
                                         
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    

                                    error_reporting(0);
                                    $sql = "SELECT meterdraw.met_name , sum(draw_num) as SUMNUM , meter.met_total,unit.* FROM meterdraw,meter
                                    LEFT OUTER JOIN unit ON (meter.unit_name=unit.unit_id)
                                    WHERE draw_status = '1' AND  draw_date_app BETWEEN '$D_Post' AND '$D_Postend' AND meterdraw.met_id = meter.met_id GROUP BY draw_metid 
                                    ";
                                  
                                          

                                    $res = mysqli_query($con, $sql);
                                    $i=1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $import_id = $row['import_id'];
                                        $met_name = $row['met_name'];
                                        $met_total = $row['met_total'];
                                        $import_total = $row['import_total'];
                                        $mem_name = $row['mem_name'];
                                        $date_import = $row['date_import'];
                                        $name2 = $row['name2'];
                                        $unit_name=$row['unit_name'];
                                        $draw_num=$row['SUMNUM'];
                                        $draw_metid=$row['draw_metid'];
                                        

                                        // $sql1 = "SELECT * FROM meter WHERE $draw_metid = met_id ";
                                        // $res1 = mysqli_query($con, $sql1);
                                        
                                        // while ($row1 = mysqli_fetch_assoc($res)) {
                                        //     $met_total=$row1['met_total'];
                                        
                                    ?>

                                    

                        </div>
                         <div class="card-body p-0">
                            <tr>
                                         <td style="text-align:center"><?= $i; ?></td>
                                         <td><?= $met_name; ?></td>
                                         <td style="text-align:center"><?= $draw_num; ?> <?= $unit_name; ?></td>
                                         <td style="text-align:center"><?= $met_total; ?> <?= $unit_name; ?></td>
                                     
                            </tr>
                        </tbody>

                            
                        <?php $i++; } ?>
                        
                        </table>
                        <!-- /.card -->



                        </div>

                    </div>
                </div>
            </div>

        </center>
    </form>
</section>

<!-- /.content -->