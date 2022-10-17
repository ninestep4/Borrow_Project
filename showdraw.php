<link rel="stylesheet" href="./dist/css/adminlte.css">
<div class="content-wrapper">
    <br>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">รายการวัสดุสำหรับเบิก</h3>
            </div>

                    <div class="col-sm-4">
                        <form align=right class="form-group my-3" method="POST">
                            <input type="text" placeholder="กรอกชื่อวัสดุที่ต้องการค้นหา" class="" name="material_name" size="25"></input>
                            <input type="submit" value="ค้นหา" class="btn-primary"></input>
                        </form>
                    </div>

                </div>

            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td width="10%">รูปภาพ</td>
                            <td width="10%">ชื่อวัสดุ</td>
                            <td width="10%">รายละเอียด</td>
                            <td width="1%">ประเภท</td>
                            <td width="15%" style="text-align:center">จำนวนวัสดุ</td>
                            <td width="5%" style="text-align:center">เบิก</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT meter.*,metertype.* FROM meter
                        LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)
                        WHERE ( met_name LIKE '%$material_name%' AND meter.met_total>='1'AND ((meter.met_mtype='1') OR (meter.met_mtype='4')) )";
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
                                <td><?= $met_detail; ?></td>
                                <td><?= $mtype_name; ?></td>
                                <td style="text-align:center"><?= $met_total; ?></td>
                                <td style="text-align:center">
                                    <a href="index.php?Node=drawmat&MATID=<?= $met_id; ?>" type="button" class="btn btn-warning" 
                                        onclick="if(confirm('คุณต้องการเบิกรายการนี้ใช่ไหม?')) return true; else return false;">เบิก 
                                    </a>
                                </td>


                            </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>