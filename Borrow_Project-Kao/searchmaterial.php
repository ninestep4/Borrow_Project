<?php
    include_once("lib/condb.php");
    include_once("lib/inc.php");
    $material_name=$_POST["material_name"];
    $sql = "SELECT * FROM meter WHERE met_name LIKE '%$material_name%' ORDER BY met_name ASC";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    $order = 1;
?>
<link rel="stylesheet" href="./dist/css/adminlte.css">
<div class="content-wrapper">
    <br>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="card-title">รายการวัสดุสำหรับเบิก</h3>
                    </div>
                    
                    <div class="col-sm-4">
                            <form align=right action="searchmaterial.php" class="form-group my-3" method="POST">   
                                <input type="text" placeholder="กรอกชื่อวัสดุที่ต้องการค้นหา" class="" name="material_name" size="25"></input>
                                <input type="submit" value="ค้นหา" class="btn btn-primary btn_custom ">
                            </form>
                    </div>
                    
                </div>
                
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="15%">รูปภาพ</th>
                            <th width="20%">ชื่อวัสดุ</th>
                            <th width="25%">รายละเอียด</th>
                            <th width="15%">ประเภท</th>
                            <th width="15%">จำนวนวัสดุ</th>
                            <th width="5%">เบิก</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT meter.*,metertype.* FROM meter
                      LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id) WHERE meter.met_total>='1'AND (meter.met_mtype='1') ";
                        
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
                                <td><?= $met_total; ?></td>
                                <td>
                                    <span class="badge bg-warning">
                                        <a href="index.php?Node=drawmat&MATID=<?= $met_id; ?>" onclick="if(confirm('คุณต้องการเบิกรายการนี้ใช่ไหม?')) return true; else return false;">เบิก</a>
                                    </span>
                                </td>


                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>