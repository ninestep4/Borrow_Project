<link rel="stylesheet" href="./dist/css/adminlte.css">
<div class="content-wrapper">
    <br>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">รายการวัสดุสำหรับเบิก</h3>
            </div>

            <div class="card-body p-0">

                <table class="table table-striped">
                    <?php

                    if (isset($_POST["txtKeyword"])) {
                        $strKeyword = $_POST["txtKeyword"];
                    }
                    ?>
                    <form name="frmSearch" method="post"?>
                        <table width="599" border="1">
                            <tr>
                                <th>Keyword
                                    <input name="txtKeyword" type="text" id="txtKeyword" value="">
                                    
                                </th>
                            </tr>
                            <button onclick="search()" class="btn-search">
                                        Search
                                    </button>
                        </table>
                    </form>

                    <tbody>
                        
                        <?php
                        error_reporting(0);
                        $sql = "SELECT * FROM people WHERE ( people_name LIKE '%$strKeyword%' )";
                        $res = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $people_id = $row['people_id'];
                            $people_name = $row['people_name'];

                            
                        ?>

                            <tr>

                                <td><?= $people_name; ?></td>




                        </tr>
                        
                        <?php } ?>

                    
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>