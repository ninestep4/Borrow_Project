<?php
        if (isset($_GET['DID'])) {
            $DID = $_GET['DID'];

        $sql = "SELECT * FROM meterdraw WHERE draw_id='$DID' ";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($res);
        $draw_id = $row['draw_id'];
        $draw_metid = $row['draw_metid'];
        $draw_num = $row['draw_num'];
        
        $sql1 = "SELECT * FROM meter WHERE met_id='$draw_metid' ";
        $res1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $met_total = $row1['met_total'];
        $metmtype = $row1['met_mtype'];
        $met_name = $row1['met_name'];

        $totaldif = $met_total + $draw_num;

        $sql2 = "UPDATE meter SET met_total='$totaldif' WHERE met_id='$draw_metid' ";
        $res2 = mysqli_query($con, $sql2);

        

        $sql1 = "UPDATE meterdraw SET draw_userid_app='$memid',draw_date_app='{$today}',draw_status='3' WHERE draw_id='$DID' ";
        $res1 = mysqli_query($con, $sql1);


        echo "<script>window.location ='index.php?Node=managedraw';</script>";

    }

 
?>
