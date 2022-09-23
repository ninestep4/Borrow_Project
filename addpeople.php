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
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="option1" checked />
                      <label class="form-check-label" for="femaleGender">หญิง</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="option2" />
                      <label class="form-check-label" for="maleGender">ชาย</label>
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