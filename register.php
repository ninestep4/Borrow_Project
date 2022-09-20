<div class="content-wrapper">
    <center>
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a class="h1">สมัครสมาชิก</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">สมัครสมาชิกใหม่</p>

                    <form action="saveregis.php" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="mem_name" class="form-control" placeholder="ชื่อ-นามสกุล">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>


                        <div class="input-group mb-3">
                            <input type="text" name="mem_mobile" class="form-control" placeholder="เบอร์โทรศัพท์">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>


                        <div class="input-group mb-3">
                            <input type="text" name="mem_residence" class="form-control" placeholder="บ้านเลขที่">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-home"></span>
                                </div>
                            </div>
                        </div>

                        
                        <div class="input-group mb-3">
                            <input type="text" name="mem_user" class="form-control" placeholder="ชื่อผู้ใช้">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="mem_pass" class="form-control" placeholder="รหัสผ่าน">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        <br>
                    </form>



                    <a href="index.php?Node=pagelogin" class="text-center">ฉันเป็นสมาชิกอยู่แล้ว</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <!-- /.register-box -->
    </center>
</div>