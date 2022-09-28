<?php
if (isset($_GET['DID'])) {
    $DID = $_GET['DID'];
    $today = date("Y-m-d");


    $sql = "UPDATE meterdraw SET draw_userid_app='$memid',draw_date_app='{$today}',draw_status='1' WHERE draw_id='$DID' ";
    $res = mysqli_query($con, $sql);
    echo '<meta http-equiv="refresh" content="0; url=index.php?Node=managedraw">';
    exit;
}
?>
<?php
$perpage = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $perpage;


$sql2 = "SELECT * from meterdraw limit {$start} , {$perpage} ";
$res2 = mysqli_query($con, $sql2);
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
                            <th width="10%">รูปภาพ</th>
                            <th width="20%">ชื่อวัสดุ</th>
                            <th width="15%">จำนวนเบิก</th>
                            <th width="20%">ผู้เบิก/วันเบิก</th>
                            <th width="20%">ผู้อนุมัติ/วันอนุมัติ</th>
                            <th width="15%">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT dr1.*,mt1.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw dr1
LEFT OUTER JOIN meter mt1 ON (dr1.draw_metid=mt1.met_id)
LEFT OUTER JOIN member m1 ON (dr1.draw_userid_draw=m1.mem_id)
LEFT OUTER JOIN member m2 ON (dr1.draw_userid_app=m2.mem_id)
order by dr1.draw_status ASC  ";

                        $res = mysqli_query($con, $sql);

                        while ($result = mysqli_fetch_assoc($res2)) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $draw_id = $row['draw_id'];
                                $metmtype = $row['met_mtype'];
                                $draw_num = $row['draw_num'];
                                $draw_metid = $row['draw_metid'];
                                $draw_userid_draw = $row['draw_userid_draw'];
                                $draw_userid_app = $row['draw_userid_app'];
                                $draw_date_app = $row['draw_date_app'];
                                $draw_status = $row['draw_status'];


                                $met_name = $row['met_name'];
                                $met_img = $row['met_img'];


                                // $name1draw = $row['name1'];
                                $name2app = $row['name2'];


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
                                        (<?= $draw_date_app ?>)
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
                                        <?= $statusname; ?>
                                        <?php if ($draw_status == '0') { ?>

                                            <a href="index.php?Node=managedraw&DID=<?= $draw_id; ?>" onclick="if(confirm('คุณต้องการอนุมัติรายการนี้ใช่ไหม?')) return true; else return false;"><input type="button" value="อนุมัติ"></a>

                                        <?php } ?>
                                    </td>
                                    </tr>
                                    <?php } ?>    
                                
                            <?php } ?>
                        
                    </tbody>
                </table>
                <?php
                                    $sql3 = "SELECT * FROM meterdraw";
                                    $query3 = mysqli_query($con, $sql3);
                                    $total_record = mysqli_num_rows($query3);
                                    $total_page = ceil($total_record / $perpage);
                                    ?>

                                    <nav>
                                        <ul class="pagination">
                                            <li>
                                                <a href="index.php?Node=managedraw?page=1" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                                <li><a href="index.php?Node=managedraw?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                            <?php } ?>
                                            <li>
                                                <a href="index.php?Node=managedraw?page=<?php echo $total_page; ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
            </div>

        </div>
    </div>
</div>