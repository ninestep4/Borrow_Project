<?php
if(!isOnline()){
  
  echo "<script>alert('กรุณาเข้าสู่ระบบก่อนการใช้งาน');window.location ='index.php?Node=pagelogin';</script>";
}
?>
<?php



if (!empty($_POST)) {
    $month = $_POST['month'];
}


?>

<link rel="stylesheet" href="./dist/css/adminlte.css">

<section class="content">
    <form action="index.php?Node=report" method="POST" enctype="multipart/form-data">
        <center>
            <div class="content-wrapper">
                <br>
                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header col-md-15 mb-4">
                            <h3 class="card-title">จัดการข้อมูลการเบิกวัสดุ</h3>


                            <div class="card-body col-md-15 mb-4"><br>
                                <select name="month" id="month" class="form-control custom-select" style="width:500px;" >
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

                                </select>

                                <input type="submit" value="ค้นหา" class="  btn-success " name="searchM" >
                                
                                
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
                                <h1>รายการนำเข้าประจำเดือน</h1>
                                <h3><?= $M ?></h3>
                            </div>

                        </div>
                        <div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                         <td style="text-align:center" width="10%" >ลำดับ</td>
                                         <td width="20%">ชื่อวัสดุ</td>
                                         <td style="text-align:center" width="15%">จำนวนคงเหลือ</td>
                                         <td style="text-align:center" width="20%">จำนวนนำเข้า</td>
                                         <td width="20%">ผู้นำเข้า</td>
                                         <td width="15%">วันที่นำเข้า</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    

                                    error_reporting(0);
                                    $sql = "SELECT * , m2.mem_name AS name2 FROM  import dr1
                                            LEFT OUTER JOIN member m2 ON (dr1.mem_name=m2.mem_id) 
                                            WHERE MONTH(date_import)='$month' ORDER BY dr1.import_id ASC";

                                    $res = mysqli_query($con, $sql);

                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $import_id = $row['import_id'];
                                        $met_name = $row['met_name'];
                                        $met_total = $row['met_total'];
                                        $import_total = $row['import_total'];
                                        $mem_name = $row['mem_name'];
                                        $date_import = $row['date_import'];
                                        $name2 = $row['name2'];
                                        $unit_name=$row['unit_name'];

                                    ?>

                                       

                        </div>
                         <div class="card-body p-0">
                            <tr>
                                         <td style="text-align:center"><?= $import_id; ?></td>
                                         <td><?= $met_name; ?></td>
                                         <td style="text-align:center"><?= $met_total; ?></td>
                                         <td style="text-align:center"><?= $import_total; ?></td>
                                         <td><?= $mem_name; ?></td>
                                         <td><?= $date_import; ?></td>
                            </tr>
                        </tbody>


                        <?php } ?>
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