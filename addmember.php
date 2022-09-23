<?php
if(isset($_POST['btsave'])){
$mem_name=$_POST['mem_name'];
$mem_mobile=$_POST['mem_mobile'];
$mem_user=$_POST['mem_user'];
$mem_pass=$_POST['mem_pass'];
$mem_dept=$_POST['mem_dept'];
$mem_level=$_POST['mem_level'];

$chk_pic=$_FILES['mem_img']["name"];
if($chk_pic<>""){
move_uploaded_file($_FILES["mem_img"]["tmp_name"],"img/".$_FILES["mem_img"]["name"]);
    $mem_img="img/".$_FILES["mem_img"]["name"];
}else{
    $mem_img='';
}

$randNumber = rand();

$sql="INSERT INTO member ";
$sql.="(mem_id,mem_name,mem_img,mem_mobile,";
$sql.="mem_user,mem_pass,mem_level)";
$sql.=" VALUES ";
$sql.=" ( ";
$sql.=" '' ";
$sql.=" ,'$mem_name' ";
$sql.=" ,'$mem_img' ";
$sql.=" ,'$mem_mobile' ";
$sql.=" ,'$mem_user' ";
$sql.=" ,'$mem_pass' ";
$sql.=" ,'$mem_level' ";
$sql.=" ) ";

$res=mysqli_query($con,$sql);
echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showmem">';
exit;

}
?>
<link rel="stylesheet" href="./dist/css/adminlte.css">



<div class="content-wrapper">
    <br>

    <form action="index.php?Node=addmem" method="POST" enctype="multipart/form-data">

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
                                                <h3 class="card-title">เพิ่มแอดมิน</h3>
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="inputName">ชื่อ-สกุล</label>
                                                    <input type="text" name="mem_name" id="inputName"
                                                        class="form-control" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">เบอร์โทร</label>
                                                    <input type="text" name="mem_mobile" id="inputName"
                                                        class="form-control" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">Username</label>
                                                    <input type="text" name="mem_user" id="inputName"
                                                        class="form-control" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputName">Password</label>
                                                    <input type="text" name="mem_pass" id="inputName"
                                                        class="form-control" required="">
                                                </div>


                                                <div class="form-group">
                                                    <label for="inputStatus">แผนก</label>
                                                    <select id="inputStatus" name="mem_dept"
                                                        class="form-control custom-select" required="">
                                                        <option selected disabled>Select one</option>
                                                        <?php
                                                        $sql="SELECT * FROM department";
                                                        $res=mysqli_query($con,$sql);
                                                        while ($row=mysqli_fetch_assoc($res)) {
                                                        $dept_id=$row['dept_id'];
                                                        $dept_name=$row['dept_name'];
                                                        ?>
                                                        <option value="<?=$dept_id;?>"><?=$dept_name;?></option>

                                                        <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStatus">สิทธิ์การใช้งาน</label>
                                                    <select id="inputStatus" name="mem_level"
                                                        class="form-control custom-select" required="">
                                                        <option selected disabled>Select one</option>
                                                        <option value="1">ผู้ดูแลระบบ</option>
                                                        <option value="2">ผู้ใช้งานทั่วไป</option>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="inputName">รูปภาพ</label>
                                                    <input type="file" name="mem_img" id="inputName"
                                                        class="form-control">
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
                                            name="btsave">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->

    </form>


</div>