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
<div class="content-wrapper">
    <br>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">จัดการข้อมูลการคืนวัสดุ</h3>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="10%">รูปภาพ</th>
                            <th width="20%">ชื่อวัสดุ</th>
                            <th width="15%">จำนวนเบิก</th>
                            <th width="20%">ผู้เบิก/วันเบิก</th>
                            <th width="20%">ผู้อนุมัติ/วันอนุมัติ</th>
                            <th width="10%">สถานะ</th>
                            <th width="20%">รายการคืน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM meter,meterdraw WHERE draw_status = '1' 
                        order by draw_status ASC  ";

                        $res = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($res)) {
                            $draw_id = $row['draw_id'];
                            $draw_date = $row['draw_date_app'];
                            $draw_num = $row['draw_num'];
                            $draw_metid = $row['draw_metid'];
                            $draw_userid_draw = $row['draw_userid_draw'];
                            $draw_userid_app = $row['draw_userid_app'];
                            $draw_date_app = $row['draw_date_app'];
                            $draw_status = $row['draw_status'];


                            $met_name = $row['met_name'];
                            $met_img = $row['met_img'];
                            $met_id = $row['met_id'];


                            
                            


                            if ($draw_status == '0') {
                                $statusname = "<font color='red'>รอรับวัสดุ</font>";
                            } else {
                                $statusname = "<font color='Green'>รับวัสดุแล้ว</font>";
                            }

                        ?>

                            <tr>
                                <td><img src="<?= $met_img; ?>" width="80"></td>
                                <td><?= $met_name; ?></td>
                                <td><?= $draw_num; ?></td>
                                <td>
                                    <?= $draw_userid_draw; ?><br>
                                    (<?= $draw_date; ?>)
                                </td>
                                <td>
                                    <?php
                                    if ($draw_status == '0') {
                                        echo "รออนุมัติ";
                                    } else {
                                    ?>
                                        <?= $draw_userid_app; ?><br>
                                        (<?= $draw_date_app; ?>)
                                    <?php } ?>
                                </td>
                                <td>
                                    <?= $statusname; ?>
                                    <?php if ($draw_status == '1') { ?>
                                </td>
                                <td>


                                    <a href="index.php?Node=restoredraw&DID=<?= $draw_id; ?>" onclick="if(confirm('คุณต้องการคืนรายการนี้ใช่ไหม?')) return true; else return false;"><input type="button" value="รับคืน"></a>
                                </td>

                            <?php } ?>
                            </td>


                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>