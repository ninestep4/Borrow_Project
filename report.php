<?php
if (!empty($_POST)) {
    $month = $_POST['month'];
}


?>
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
                                <select name="month" id="month" class="form-control custom-select" style="width:500px;">
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
                                <input type="submit" value="ค้นหา" class="btn btn-success float-right " name="searchM" style="right:10px;">

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
                                        <th width="10%">ลำดับ</th>
                                        <th width="20%">ชื่อวัสดุ</th>
                                        <th width="15%" style="text-align:center">จำนวนคงเหลือ</th>
                                        <th width="20%" style="text-align:center">จำนวนนำเข้า</th>
                                        <th width="20%">ผู้นำเข้า</th>
                                        <th width="15%">วันที่นำเข้า</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    

                                    error_reporting(0);
                                    $sql = "SELECT * , m2.mem_name AS name2 FROM  import dr1
                                            LEFT OUTER JOIN member m2 ON (dr1.mem_name=m2.mem_id)
                                            WHERE MONTH(date_import)='$month'";

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

                                <td><?= $import_id; ?></td>
                                <td><?= $met_name; ?></td>
                                <td style="text-align:center"><?= $met_total; ?> <?= $unit_name; ?> </td>
                                <td style="text-align:center"><?= $import_total; ?> <?= $unit_name; ?>  </td>
                                <td><?= $name2; ?></td>
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