<?php
if(!isOnline()){
  
  echo "<script>alert('กรุณาเข้าสู่ระบบก่อนการใช้งาน');window.location ='index.php?Node=pagelogin';</script>";
}
?>
<link rel="stylesheet" href="./dist/css/adminlte.css">
<div class="content-wrapper">
    <br>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header col-md-15 mb-1">

                <div class="col-sm-8">
                    <h3 class="card-title">รายการครุภัณฑ์สำหรับการยืม</h3>
                </div>

                <form method="POST">

                    <div align=center class="card-body col-md-15 mb-1">

                        <div class="row">
                            <div align=center>
                                <input type="text" name="Name" id="Name" class=" form-control " style="width:280px;" style="text-align: center" placeholder="ป้อนชื่อวัสดุ/ครุภัณฑ์ที่ต้องการค้นหา" />
                                <br>
                            </div>
                        </div>
                        
                        <div id="peoplename"></div>

                    </div>
                    </body>
                    <style>
                        ul {
                            cursor: pointer;
                        }
                    </style>



                    <script>
                        $(document).ready(function() {
                            $('#Name').keyup(function() {
                                var query = $(this).val();
                                if (query != '') {
                                    $.ajax({
                                        url: "searchmeter.php",
                                        method: "POST",
                                        data: {
                                            query: query
                                        },
                                        success: function(data) {
                                            $('#peoplename').fadeIn();
                                            $('#peoplename').html(data);



                                        }
                                    });
                                }
                            });
                            $(document).on('click', 'li', function() {
                                $('#Name').val($(this).text());
                                $('#peoplename').fadeOut();
                            });

                        });

                        if (isset($_POST["valuesearch"])) {
                            $valuesearch = $_POST["valuesearch"];
                            print_r($valuesearch);
                        }
                    </script>
			<div align=center>
                        <input type="submit" value="ค้นหา" class="btn btn-success ">
                    </div>
                </form>



            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td width="10%">รูปภาพ</td>
                            <td width="10%">ชื่อวัสดุ</td>
                            <td width="10%">รายละเอียด</td>
                            <td width="1%">ประเภท</td>
                            <td width="15%" style="text-align:center">จำนวนวัสดุ</td>
                            <td width="5%" style="text-align:center">ยืม</td>
                        </tr>
                    </thead>



                    <tbody>
                        <?php
                            if (isset($_POST["Name"])) {
                              $material_name = $_POST["Name"];
                        }
                        error_reporting(0);
                        $sql = "SELECT meter.*,metertype.*,unit.* FROM meter
                        LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)
                        LEFT OUTER JOIN unit ON (meter.unit_name=unit.unit_id)
                        WHERE ( met_name LIKE '%$material_name%' AND meter.met_total>='1'AND (meter.met_mtype='2')  )";
                        $res = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($res)) {
                            $met_id = $row['met_id'];
                            $met_name = $row['met_name'];
                            $met_detail = $row['met_detail'];
                            $met_img = $row['met_img'];
                            $met_total = $row['met_total'];
                            $met_mtype = $row['met_mtype'];
		            $unit_name = $row['unit_name'];

                            $mtype_name = $row['mtype_name'];

                        ?>

                            <tr>
                                <td><img src="<?= $met_img; ?>" width="80"></td>
                                <td><?= $met_name; ?></td>
                                <td><?= $met_detail; ?></td>
                                <td><?= $mtype_name; ?></td>
                                <td style="text-align:center"><?= $met_total; ?> <?= $unit_name; ?></td>

                                <td style="text-align:center">
                                    <a href="index.php?Node=drawmat&MATID=<?= $met_id; ?>" type="button" class="btn btn-warning" onclick="if(confirm('คุณต้องการเบิกรายการนี้ใช่ไหม?')) return true; else return false;">ยืม
                                    </a>
                                </td>


                            </tr>

                        <?php } ?>



                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>