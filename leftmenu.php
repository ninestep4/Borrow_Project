<?php
include_once("lib/condb.php");
include_once("lib/inc.php");

if (isOnline()) {

    $memid = $_SESSION['memid'];

    $sql = "SELECT * FROM member WHERE mem_id='$memid' ";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $mem_id = $row['mem_id'];
    $mem_name = $row['mem_name'];
}

?>
<link rel="stylesheet" href="./dist/css/adminlte.css">
<!-- Main Sidebar Container -->


 <aside class="main-sidebar sidebar-dark-primary elevation-4"> 


    <!-- Brand Logo -->


    <a href="index.php" class="brand-link">
        <img src="img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <ul class="brand-text font-weight-light">ระบบจอง-ยืม-คืนวัสดุ</ul>
    </a>

    <?php
    if (isOnline()) {
    ?>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="index.php?Node=editpro&MEMID=<?= $mem_id; ?>" class="d-block">ชื่อผู้ใช้ : <?= $mem_name; ?></a>
                </div>

            </div>

        <?php } ?>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav  nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php
                if (!isOnline()) {
                ?>

                    <li class="nav-header">เมนูการใช้งาน</li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">หน้าแรก</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?Node=pagelogin" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>ล็อกอินเข้าระบบ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>แนะนำการใช้งาน</p>
                        </a>
                    </li>

                <?php
                }
                ?>





                <?php
                if (isOnline()) {
                ?>


                    <?php
                    if (isAdmin($_SESSION['usr'], $_SESSION['pwd'], $con)) {
                    ?>

                        <li class="nav-item">
                            <a href="index.php?Node=sdraw" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>ทำเรื่องยืมวัสดุ</p>
                            </a>
                        </li>  
                        
                        <li class="nav-item">
                            <a href="index.php?Node=sdraw" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>ทำเรื่องยืมครุภัณฑ์</p>
                            </a>
                        </li> 


                        <div class="info">
                                <a class="d-block"> เมนูแอดมิน</a>
                        </div>
                    

                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="material-icons opacity-10">dashboard</i>
                                <p>แดชบอร์ด</p>
                            </a>
                        </li>

                        

                        <li class="nav-item">
                            <a href="index.php?Node=showmem" class="nav-link">
                                <i class="material-icons  ">people</i>
                                <p>จัดการข้อมูลแอดมิน</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=showpeople" class="nav-link">
                                <i class="material-icons  ">people</i>
                                <p>จัดการข้อมูลผู้ใช้งาน</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=smat" class="nav-link">
                                <i class="material-icons ">assignment</i>
                                <p>จัดการข้อมูลวัสดุ</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=showdurable" class="nav-link">
                                <i class="material-icons ">assignment</i>
                                <p>จัดการข้อมูลครุภัณฑ์</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=managedraw" class="nav-link">
                                <i class="material-icons ">check</i>
                                <p>จัดการข้อมูลการยืมวัสดุ</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=managedraw" class="nav-link">
                                <i class="material-icons ">check</i>
                                <p>จัดการข้อมูลการครุภัณฑ์</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=restoredraw" class="nav-link">
                                <i class="material-icons">autorenew</i>
                                <p>จัดการข้อมูลการคืนวัสดุ</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=search" class="nav-link">
                                <i class="material-icons">search</i>
                                <p>รายงานวัสดุคงเหลือ</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="index.php?Node=lout" class="nav-link">
                                <i class="material-icons ">logout</i>
                                <p>ออกจากระบบ</p>
                            </a>
                        </li>


                    <?php } else if (isUser($_SESSION['usr'], $_SESSION['pwd'], $con)) { ?>

                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>แดชบอร์ด</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=sdraw" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>เบิกวัสดุ</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?Node=hisdraw" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>ประวัติการเบิกวัสดุ</p>
                            </a>
                        </li>
                    
                    
                        <li class="nav-item">
                            <a href="index.php?Node=lout" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>ออกจากระบบ</p>
                            </a>
                        </li>
                    
                    <?php } ?>

                <?php } ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
</aside>