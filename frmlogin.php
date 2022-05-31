<div class="content-wrapper">
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
            <button type="submit" class="btn btn-primary btn-block" name="btlogin">ตกลง</button>
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