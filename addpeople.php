<?php

if (isset($_POST['btsave'])) {
  $people_name = $_POST['people_name'];
  $people_sex = $_POST['people_sex'];
  $people_number = $_POST['people_number'];
  $people_address = $_POST['people_address'];
  $people_idcard = $_POST['people_idcard'];
  $people_type = $_POST['people_type'];
  $peoplename_refer = $_POST['peoplename_refer'];
  $number_refer = $_POST['number_refer'];

  $sql = "INSERT INTO people ";
  $sql .= "(people_id,people_name,people_sex,people_number,";
  $sql .= "people_address,people_idcard,people_type,peoplename_refer,number_refer)";
  $sql .= " VALUES ";
  $sql .= " ( ";
  $sql .= " '' ";
  $sql .= " ,'$people_name' ";
  $sql .= " ,'$people_sex' ";
  $sql .= " ,'$people_number' ";
  $sql .= " ,'$people_address' ";
  $sql .= " ,'$people_idcard' ";
  $sql .= " ,'$people_type' ";
  $sql .= " ,'$peoplename_refer' ";
  $sql .= " ,'$number_refer' ";
  $sql .= " ) ";

  $res = mysqli_query($con, $sql);
  echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showpeople">';
  exit;
}
?>




<link rel="stylesheet" href="./dist/css/adminlte.css">
<div class="container py-5 h-100">

  <section>

    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">ฟอร์ม สมัครสมาชิก</h3>
            <form action="index.php?Node=addpeople" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-15 mb-4">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control-lg" name="people_name" id="inputName" />
                    <label class="form-label" for="inputName">ชื่อ-สกุล</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" name="people_number" id="inputName" />
                    <label for="inputName" class="form-label">เบอร์โทรศัพท์</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1">เพศ: </h6>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="people_sex" id="femaleGender" value="หญิง" checked />
                    <label class="form-check-label" for="femaleGender">หญิง</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="people_sex" id="maleGender" value="ชาย" />
                    <label class="form-check-label" for="maleGender">ชาย</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control-lg" name="people_address" id="inputName" />
                    <label class="form-label" for="inputName">ที่อยู่อาศัย</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control-lg" name="people_idcard" id="inputName" />
                    <label class="form-label" for="inputName">เลขบัตรประชาชน</label>
                  </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-15 mb-4">
                  <select class="select form-control-lg" name="people_type">
                    <option value="0" disabled>ประเภทของบุคคล</option>
                    <option value="บุคคลในชุมชน">บุคคลในชุมชน</option>
                    <option value="บุคคลนอกชุมชน">บุคคลนอกชุมชน</option>
                  </select>
                  <label class="form-label select-label">ประเภทของบุคคล</label>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control-lg" name="peoplename_refer" id="inputName" />
                    <label class="form-label" for="inputName">ชื่อ-สกุล ผู้อ้างอิง</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="text" class="form-control form-control-lg" name="number_refer" id="inputName" />
                    <label class="form-label" for="inputName">เบอร์โทรศัพท์ผู้อ้างอิง</label>
                  </div>
                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="บันทึกรายการ" name="btsave">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>