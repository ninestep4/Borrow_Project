<?php
if (isset($_GET['DID'])) {
    $DID = $_GET['DID'];
    $today = date("Y-m-d");


    $sql = "UPDATE meterdraw SET draw_userid_app='$memid',draw_date_app='{$today}',draw_status='1' WHERE draw_id='$DID' ";
    $res = mysqli_query($con, $sql);
    echo '<meta http-equiv="refresh" content="0; url=index.php?Node=managedraw">';
    exit;
}

$sql = "SELECT * FROM meter";
$res = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($res)) {
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
                <h3 class="card-title">จัดการข้อมูลการเบิกวัสดุ</h3>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>รูปภาพ</td>
                            <td>ชื่อวัสดุ</td>
                            <td>จำนวนเบิก</td>
                            <td>ผู้เบิก/วันเบิก</td>
                            <td>ผู้อนุมัติ/วันอนุมัติ</td>
                            <td>รายละเอียด</td>
                            <td>สถานะ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT dr1.*,mt1.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw dr1  
                                LEFT OUTER JOIN meter mt1 ON (dr1.draw_metid=mt1.met_id)
                                LEFT OUTER JOIN member m1 ON (dr1.draw_userid_draw=m1.mem_id)
                                LEFT OUTER JOIN member m2 ON (dr1.draw_userid_app=m2.mem_id)
                                order by dr1.draw_status ASC ";

                        $res = mysqli_query($con, $sql);


                        while ($row = mysqli_fetch_assoc($res)) {
                            $draw_id = $row['draw_id'];
                            $met_mtype = $row['met_mtype'];
                            $draw_num = $row['draw_num'];
                            $draw_metid = $row['draw_metid'];
                            $draw_userid_draw = $row['draw_userid_draw'];
                            $draw_userid_app = $row['draw_userid_app'];
                            $draw_date_app = $row['draw_date_app'];
                            $draw_status = $row['draw_status'];


                            $met_name = $row['met_name'];
                            $met_img = $row['met_img'];


                            $name1draw = $row['name1'];
                            $name2app = $row['name2'];


                            if ($draw_status == '0') {
                                $statusname = "<font color='yellow'>รอการอนุมัติ</font>";
                            } elseif($draw_status == '3') {
                                $statusname = "<font color='red'>ไม่อนุมัติ</font>";
                            }
                            else{
                                $statusname = "<font color='Green'>อนุมัติ</font>";
                            }

                        ?>

                            <tr>
                                <td><img src="<?= $met_img; ?>" width="80"></td>
                                <td><?= $met_name; ?></td>
                                <td><?= $draw_num; ?></td>

                                <td>
                                    <?= $name1draw; ?><br>
                                    <?= $draw_date_app ?>
                                </td>

                                <td>
                                    <?php
                                    if ($draw_status == '0') {
                                        echo "รออนุมัติ";
                                    } else {
                                    ?>
                                        <?= $name2app; ?><br>
                                        (<?= $draw_date_app; ?>)
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="index.php?Node=detail&DID=<?= $draw_id; ?>" class="nav-link">
                                        <i class="material-icons">search</i>
                                    </a>

                                </td>
                                <td>
                                    <?= $statusname; ?>
                                    <?php if ($draw_status == '0') { ?>

                                        <a href="index.php?Node=managedraw&DID=<?= $draw_id; ?>" 
                                        onclick="if(confirm('คุณต้องการอนุมัติรายการนี้ใช่ไหม?')) return true; else return false;"><input type="button" value="อนุมัติ"></a>

                                    <?php } ?>
                                    <?php if ($draw_status == '0') { ?>

                                        <a href="index.php?Node=noapp&DID=<?= $draw_id; ?>" onclick="if(confirm('คุณไม่ต้องการอนุมัติรายการนี้ใช่ไหม?')) return true; else return false;"><input name="btno" type="button" value="ไม่อนุมัติ"></a>

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