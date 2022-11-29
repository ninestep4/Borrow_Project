<?php
if(!isOnline()){
  
  echo "<script>alert('กรุณาเข้าสู่ระบบก่อนการใช้งาน');window.location ='index.php?Node=pagelogin';</script>";
}
?>
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

if(isset($_POST['btre'])){

    $met_id = $_POST['draw_metid'];
    $draw_num = $_POST['draw_num'];

    $sql1 = "SELECT * FROM meter WHERE met_id='$met_id' ";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $met_total = $row1['met_total'];
    $metmtype = $row1['met_mtype'];
    $met_name = $row1['met_name'];

    $totaldif = $met_total + $draw_num;

    $sql2 = "UPDATE meter SET met_total='$totaldif' WHERE met_id='$met_id' ";
  $res2 = mysqli_query($con, $sql2);
    }
    ?>

<link rel="stylesheet" href="./dist/css/adminlte.css">
<div class="content-wrapper">
    <br>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">จัดการข้อมูลการคืนครุภัณฑ์</h3>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td width="10%">รูปภาพ</td>
                            <td width="7%">ชื่อวัสดุ</td>
                            <td width="15%" style="text-align:center">จำนวนเบิก</td>
                            <td width="15%">ผู้เบิก/วันเบิก</td>
                            <td width="20%">ผู้อนุมัติ/วันอนุมัติ</td>
                            <td style="text-align:center">รายละเอียด</td>
                            <td width="10%">สถานะ</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT dr1.*,mt1.*,unit.*,m1.mem_name AS name1,m2.mem_name AS name2 FROM meterdraw dr1  
                        LEFT OUTER JOIN meter mt1 ON (dr1.draw_metid=mt1.met_id)
                        LEFT OUTER JOIN unit ON (dr1.unit_name=unit.unit_id)
                        LEFT OUTER JOIN member m1 ON (dr1.draw_userid_draw=m1.mem_id)
                        LEFT OUTER JOIN member m2 ON (dr1.draw_userid_app=m2.mem_id)
                        order by dr1.draw_status ASC ";

                        $res = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($res)) {
                            $met_mtype = $row['met_mtype'];
                            if($met_mtype == '2'){
                            $draw_id = $row['draw_id'];
                            $draw_date = $row['draw_date_app'];
                            $draw_num = $row['draw_num'];
                            $draw_metid = $row['draw_metid'];
                            $draw_userid_draw = $row['people_name'];
                            $draw_userid_app = $row['draw_userid_app'];
                            $draw_date_app = $row['draw_date_app'];
                            $draw_status = $row['draw_status'];
                            $unit_name = $row['unit_name'];

                            


                            $met_name = $row['met_name'];
                            $met_img = $row['met_img'];
                            $met_id = $row['met_id'];
                            $met_total = $row['met_total'];
                           
                            $name2app = $row['name2'];
                            
                            
                            


                            if ($draw_status == '1') {
                                $statusname = "<font color='red'>รอรับครุภัณฑ์</font>";
                            } 
                            else if ($draw_status == '4') {
                                $statusname = "<font color='GREEN'>รับครุภัณฑ์คืนแล้ว</font>";
                            } 
                            
                            
                        
                        ?>

                            <tr>
                                <td><img src="<?= $met_img; ?>" width="80"></td>
                                <td><?= $met_name; ?></td>
                                <td style="text-align:center"><?= $draw_num; ?> <?= $unit_name; ?></td>
                                <td>
                                    <?= $draw_userid_draw; ?><br>
                                    (<?= $draw_date; ?>)
                                </td>
                                <td>
                                    <?php
                                    if ($draw_status == '0') {
                                        echo "รออนุมัติ";
                                    } 
                                   
                                    else {
                                    ?>
                                        <?= $name2app; ?><br>
                                        (<?= $draw_date_app; ?>)
                                    <?php } ?>
                                </td>
                                <td style="text-align:center">
                                    <a href="index.php?Node=detail&DID=<?= $draw_id; ?>" class="nav-link">
                                        <i class="material-icons">search</i>
                                    </a>

                                </td>
                                <?php error_reporting(0); ?>
                                <td>
                                    <?= $statusname; ?>
                                    <?php if ($draw_status == '1') { ?>
                                


                                <a href="index.php?Node=fucre&DID=<?= $draw_id; ?>" onclick="if(confirm('คุณต้องการคืนรายการนี้ใช่ไหม?')) return true; else return false;"><input type="button" name="btre" value="รับคืน"></a>
                                </td>

                                <?php } ?>
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