<?php
    if (isset($_GET['DID'])) {
        $DID = $_GET['DID'];

        $sql = "SELECT * FROM meterdraw";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        

        $draw_num = $row['draw_num'];
        $met_id = $row['met_id'];
        
        

        $sql1 = "UPDATE meterdraw SET draw_userid_app='$memid',draw_date_app='{$today}',draw_status='3' WHERE draw_id='$DID' ";
        $res1 = mysqli_query($con, $sql1);

    }

 
?>
