<?php
if(!isOnline()){
  
  echo "<script>alert('กรุณาเข้าสู่ระบบก่อนการใช้งาน');window.location ='index.php?Node=pagelogin';</script>";
}
?>
<?php
if (isset($_GET['PEOPLEID'])) {
    $PEOPLEID = $_GET['PEOPLEID'];
    $sql = "DELETE FROM people WHERE people_id='$PEOPLEID' ";
    $res = mysqli_query($con, $sql);
    echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showpeople">';
    exit;
}

?>
<link rel="stylesheet" href="./dist/css/adminlte.css">
<div class="content-wrapper">
    <br>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    
                    <div class="col-sm-8" class="card-title">จัดการข้อมูลผู้ใช้งาน
                        <a href="index.php?Node=addpeople"> [เพิ่มผู้ใช้งาน] </a>
                    </div>
                    <div class="col-sm-4">
                        <form align=right class="form-group my-3" method="POST">
                            <input type="text" placeholder="กรอกชื่อ-สกุลที่ต้องการค้นหา" class="" name="people_name" size="25"></input>
                            <input type="submit" value="ค้นหา" class=" btn-primary " onclick="search()">
                    </div>
                </div>
            </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>ชื่อ-สกุล</th>
                                <th>เพศ</th>
                                <th>เบอร์โทร</th>
                                <th>ที่อยู่</th>
                                <th>เลขบัตรประชาชน</th>
                                <th>ประเภทของบุคคล</th>
                                <th>แก้ไขประวัติ</th>
                                <th>ลบข้อมูล</th>


                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            if (isset($_POST["people_name"])) {
                                $people_name = $_POST["people_name"];
                              }
                            error_reporting(0);
                            $sql = "SELECT people. * FROM people WHERE people_name LIKE '%$people_name%'";
                            $res = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                                $people_id = $row['people_id'];
                                $people_name = $row['people_name'];
                                $people_sex = $row['people_sex'];
                                $people_address = $row['people_address'];
                                $people_idcard = $row['people_idcard'];
                                $people_number = $row['people_number'];
                                $people_type = $row['people_type'];
                                $peoplename_refer = $row['peoplename_refer'];
                                $number_refer = $row['number_refer'];

                            ?>

                                <tr>

                                    <td><?= $people_name; ?><br>
                                       (<?= $peoplename_refer; ?>)
                                    </td>
                                    <td><?= $people_sex; ?></td>
                                    <td><?= $people_number; ?><br>
                                       (<?= $number_refer; ?>)
                                    </td>
                                    <td><?= $people_address; ?></td>
                                    <td><?= $people_idcard; ?></td>
                                    <td><?= $people_type; ?></td>







                                    <td>
                                        <a href="index.php?Node=editpeople&PEOPLEID=<?= $people_id; ?>" type="button" class="btn btn-warning" onclick="if(confirm('คุณต้องการแก้ไขรายการนี้ใช่ไหม?')) return true; else return false;">แก้ไข
                                        </a>
                                    </td>

                                    <!-- <td>
                                    <span class="badge bg-danger">
                                        <a href="index.php?Node=showpeople&PEOPLEID=<?= $people_id; ?>" onclick="if(confirm('คุณต้องการลบรายการนี้ใช่ไหม?')) return true; else return false;">ลบ</a>
                                    </span>
                                </td> -->

                                    <td>
                                        <a href="index.php?Node=showpeople&PEOPLEID=<?= $people_id; ?>" type="button" class="btn btn-danger" onclick="if(confirm('คุณต้องการลบรายการนี้ใช่ไหม?')) return true; else return false;">ลบ
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