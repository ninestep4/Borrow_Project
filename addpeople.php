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
<link rel="stylesheet" href="./dist/css/adminlte.css">
<section class="vh-100 gradient-custom">
  <div class="content-wrapper">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">ฟอร์ม สมัครสมาชิก</h3>
            <form>
              <div class="row">
                <div class="col-md-15 mb-4">
                  <div class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">ชื่อ-สกุล</label>
                  </div>
                
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" id="birthdayDate" />
                    <label for="birthdayDate" class="form-label">เบอร์โทรศัพท์</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1">เพศ: </h6>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                      value="option1" checked />
                    <label class="form-check-label" for="femaleGender">หญิง</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                      value="option2" />
                    <label class="form-check-label" for="maleGender">ชาย</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                      value="option3" />
                    <label class="form-check-label" for="otherGender">อื่นๆ</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="email" id="emailAddress" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">ที่อยู่อาศัย</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">เลขบัตรประชาชน</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <select class="select form-control-lg">
                    <option value="1" disabled>ประเภทของบุคคล</option>
                    <option value="2">บุคคลในชุมชน</option>
                    <option value="3">บุคคลนอกชุมชน</option>
                    <option value="4">อื่นๆ</option>
                  </select>
                  <label class="form-label select-label">ประเภทของบุคคล</label>
                </div>
              </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>