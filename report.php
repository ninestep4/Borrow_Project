<?php

require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI'=> 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);


    if (!empty($_POST)) {
        $month = $_POST['month'];
      }   

    ?>

    



 <section class="content">
     <form action="index.php?Node=report" method="POST" enctype="multipart/form-data">
         <center>
             <div class="content-wrapper">
                 <br>
                 <div class="col-md-12">

                     <div class="card">

                         <div class="card-header col-md-15 mb-4">
                             <h3 class="card-title">จัดการข้อมูลการเบิกวัสดุ</h3>


                             <div class="card-body col-md-15 mb-4"><br>
                                 <select name="month" id="month" class="form-control custom-select" style="width:500px;">
                                     <option value="">เลือกเดือนที่ต้องการค้นหา</option>



                                     <option value="1">มกราคม</option>
                                     <option value="2">กุมภาพันธ์</option>
                                     <option value="3">มีนาคม</option>
                                     <option value="4">เมษายน</option>
                                     <option value="5">พฤษภาคม</option>
                                     <option value="6">มิถุนายน</option>
                                     <option value="7">กรกฎาคม</option>
                                     <option value="8">สิงหาคม</option>
                                     <option value="9">กันยายน</option>
                                     <option value="10">ตุลาคม</option>
                                     <option value="11">พฤศจิกายน</option>
                                     <option value="12">ธันวาคม</option>


                                 </select>
                                 <input type="submit" value="ค้นหา" class=" btn-success " name="searchM" >
                             
                                 
                                 <!-- <input type="button" value="Download PDF File" onclick="DownloadFile('Sample.pdf')" />

                                    <script type="text/javascript">
                                        function DownloadFile(fileName) {
                                            //Set the File URL.
                                            var url = "Files/" + fileName;
                                
                                            //Create XMLHTTP Request.
                                            var req = new XMLHttpRequest();
                                            req.open("GET", url, true);
                                            req.responseType = "blob";
                                            req.onload = function () {
                                                //Convert the Byte Data to BLOB object.
                                                var blob = new Blob([req.response], { type: "application/octetstream" });
                                
                                                //Check the Browser type and download the File.
                                                var isIE = false || !!document.documentMode;
                                                if (isIE) {
                                                    window.navigator.msSaveBlob(blob, fileName);
                                                } else {
                                                    var url = window.URL || window.webkitURL;
                                                    link = url.createObjectURL(blob);
                                                    var a = document.createElement("a");
                                                    a.setAttribute("download", fileName);
                                                    a.setAttribute("href", link);
                                                    document.body.appendChild(a);
                                                    a.click();
                                                    document.body.removeChild(a);
                                                }
                                            };
                                            req.send();
                                        };
                                    </script> -->

                                     <!-- ใช้ได้แต่ต้องมี server ก้อน -->
                                        <!-- <button type="button" id="GetFile">Download</button>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                                        <script>
                                        $('#GetFile').on('click', function () {
                                            $.ajax({
                                                url: 'http://google.com',
                                                method: 'GET',
                                                xhrFields: {
                                                    responseType: 'blob'
                                                },
                                                success: function (data) {
                                                    var a = document.createElement('a');
                                                    var url = window.URL.createObjectURL(data);
                                                    a.href = url;
                                                    a.download = 'myfile.pdf';
                                                    document.body.append(a);
                                                    a.click();
                                                    a.remove();
                                                    window.URL.revokeObjectURL(url);
                                                }
                                            });
                                        });
                                        </script> -->
                                        
                                        <a href="MyReport.pdf">โหลดผลการเรียน (pdf)</a>
                             </div>


                                   
                             <?php 
                                    error_reporting(0);
                                    
                                    if($month==1){
                                        $M="มกราคม";
                                    };
                                    if($month==2){
                                        $M="กุมภาพันธ์";
                                    };
                                    if($month==3){
                                        $M="มีนาคม";
                                    };
                                    if($month==4){
                                        $M="เมษายน";
                                    };
                                    if($month==5){
                                        $M="พฤษภาคม";
                                    };
                                    if($month==6){
                                        $M="มิถุนายน";
                                    };
                                    if($month==7){
                                        $M="กรกฎาคม";
                                    };
                                    if($month==8){
                                        $M="สิงหาคม";
                                    };
                                    if($month==9){
                                        $M="กันยายน";
                                    };
                                    if($month==10){
                                        $M="ตุลาคม";
                                    };
                                    if($month==11){
                                        $M="พฤศจิกายน";
                                    };
                                    if($month==12){
                                        $M="ธันวาคม";
                                    };
                             ?>
                             
                             <?php
                             ob_start();
                             ?>

                             <div>
                                <?php error_reporting(0);?>
                                        <h1>รายการนำเข้าประจำเดือน</h1>
                                        <h3><?=$M ?></h3>
                                 </div>
                             
                         </div>
                         <div>
                            
                         <table class="table table-striped">
                                 <thead>
                                     <tr>
                                         <th width="10%">ลำดับ</th>
                                         <th width="20%">ชื่อวัสดุ</th>
                                         <th width="15%">จำนวนคงเหลือ</th>
                                         <th width="20%">จำนวนนำเข้า</th>
                                         <th width="20%">ผู้นำเข้า</th>
                                         <th width="15%">วันที่นำเข้า</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                            <?php
                             

                             error_reporting(0);
                             $sql = "SELECT * FROM  import WHERE MONTH(date_import)='$month'";
                             $res = mysqli_query($con,$sql);
                             
                             while ($row = mysqli_fetch_assoc($res)) {
                             $import_id = $row['import_id'];
                             $met_name = $row['met_name'];
                             $met_total = $row['met_total'];
                             $import_total = $row['import_total'];
                             $mem_name = $row['mem_name'];
                             $date_import = $row['date_import'];

                                
                             ?>
                         </div>
                         <div class="card-body p-0">
                             



                                     <tr>

                                         <td><?= $import_id; ?></td>
                                         <td><?= $met_name; ?></td>
                                         <td><?= $met_total; ?></td>
                                         <td><?= $import_total; ?></td>
                                         <td><?= $mem_name; ?></td>
                                         <td><?= $date_import; ?></td>



                                     </tr>


                                 </tbody>


                            <?php } ?>
                             </table>

                            <?php
                                $html=ob_get_contents();
                                $mpdf->WriteHTML($html);
                                $mpdf->Output("MyReport.pdf");
                                ob_end_flush();
                            ?>

                             <!-- /.card -->
                         </div>

                     </div>
                 </div>
             </div>

         </center>
     </form>
 </section>

 <!-- /.content -->