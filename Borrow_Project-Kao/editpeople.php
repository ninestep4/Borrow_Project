<?php
include_once "lib/condb.php";
if (isset($_GET['PEOPLEID'])) {
    $PEOPLEID = $_GET['PEOPLEID'];

    $sql = "SELECT * FROM people WHERE people_id='$PEOPLEID' ";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $people_id = $row['people_id'];
    $people_name = $row['people_name'];
    $people_number = $row['people_number'];
    $people_address = $row['people_address'];
    $people_idcard = $row['people_idcard'];
}
?>
<link rel="stylesheet" href="./dist/css/adminlte.css">

<?php
if (isset($_POST['btsavepeople'])) {
    $people_id = $_POST['people_id'];
    $people_name = $_POST['people_name'];
    $people_number = $_POST['people_number'];
    $people_address = $_POST['people_address'];
    $people_idcard = $row['people_idcard'];

    $sql = "UPDATE people SET ";
    $sql .= " people_name='$people_name' ";
    $sql .= " ,people_number='$people_number' ";
    $sql .= " ,people_address='$people_address' ";
    $sql .= " ,people_idcard='$people_idcard' ";

    $sql .= " WHERE people_id='$people_id' ";

    $res = mysqli_query($con, $sql);
    echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showpeople">';
    exit;
}

?>

<div class="content-wrapper">
    <br>

    <form action="index.php?Node=editpeople" method="POST" enctype="multipart/form-data">

        <!-- Main content -->
        <section class="content">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">แก้ไขข้อมูลผู้ใช้</h3>
                                            </div>
                                            <div class="card-body">

                                                <input type="hidden" name="people_id" value="<?=$people_id;?>">


                                                <div class="form-group">
                                                    <label for="inputName">ชื่อ-นามสกุล</label>
                                                    <input type="text" name="people_name" id="inputName"
                                                        class="form-control" required="" value="<?=$people_name;?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">เบอร์โทรศัพท์</label>
                                                    <input type="text" name="people_number" id="inputName"
                                                        class="form-control" required="" value="<?=$people_number;?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">ที่อยู่อาศัย</label>
                                                    <input type="text" name="people_address" id="inputName"
                                                        class="form-control" required="" value="<?=$people_address;?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">เลขบัตรประชาชน</label>
                                                    <input type="text" name="people_idcard" id="inputName"
                                                        class="form-control" required="" value="<?=$people_idcard;?>">
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="บันทึกรายการ" class="btn btn-success float-right"
                                            name="btsavepeople">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

    </form>

</div>