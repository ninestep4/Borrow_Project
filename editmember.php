<?php
include_once("lib/condb.php");
if (isset($_GET['MEMID'])) {
    $MEMID = $_GET['MEMID'];

    $sql = "SELECT * FROM member WHERE mem_id='$MEMID' ";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $mem_id = $row['mem_id'];
    $mem_name = $row['mem_name'];
    $mem_mobile = $row['mem_mobile'];
    $mem_residence = $row['mem_residence'];
}
?>


<?php
if (isset($_POST['btsavemem'])) {
    $mem_id = $_POST['mem_id'];
    $mem_name = $_POST['mem_name'];
    $mem_mobile = $_POST['mem_mobile'];
    $mem_residence = $_POST['mem_residence'];

    $sql = "UPDATE member SET ";
    $sql .= " mem_name='$mem_name' ";
    $sql .= " ,mem_mobile='$mem_mobile' ";
    $sql .= " ,mem_residence='$mem_residence' ";

    $sql .= " WHERE mem_id='$mem_id' ";

    $res = mysqli_query($con, $sql);
    echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showmem">';
    exit;
}

?>

<div class="content-wrapper">
    <br>

    <form action="index.php?Node=editmem" method="POST" enctype="multipart/form-data">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">แก้ไขข้อมูลผู้ใช้</h3>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="mem_id" value="<?= $mem_id; ?>">


                            <div class="form-group">
                                <label for="inputName">ชื่อ-นามสกุล</label>
                                <input type="text" name="mem_name" id="inputName" class="form-control" required="" value="<?= $mem_name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputName">เบอร์โทรศัพท์</label>
                                <input type="text" name="mem_mobile" id="inputName" class="form-control" required="" value="<?= $mem_mobile; ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputName">ที่อยู่อาศัย</label>
                                <input type="text" name="mem_residence" id="inputName" class="form-control" required="" value="<?= $mem_residence; ?>">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="บันทึกรายการ" class="btn btn-success float-right" name="btsavemem">
                </div>
            </div>
            <br>
        </section>
        <!-- /.content -->

    </form>


</div>