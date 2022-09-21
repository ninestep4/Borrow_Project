<div class="content-wrapper">
<link rel="stylesheet" href="./dist/css/adminlte.css">
<center>
<br><br>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>ล็อกอิน</b>เข้าระบบ</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">กรุณากรอกข้อมูลให้ถูกต้อง</p>

      <form action="index.php?Node=chk" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="user" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block" name="btlogin">ตกลง</button>
          </div>
          
          <br>

          <div class="col-12">
            <a href="index.php?Node=reg"class="btn btn-warning btn-block" name="btregis">สมัครสมาชิก</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</center>
</div>