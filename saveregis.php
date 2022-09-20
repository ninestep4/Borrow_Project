<?php
include_once("lib/condb.php");
?>

<?php

$name = $_POST['mem_name'];
$mobile = $_POST['mem_mobile'];
$username = $_POST['mem_user'];
$pass = $_POST['mem_pass'];
$residence = $_POST['mem_residence'];


$sql = "SELECT * from member  where mem_user ='$_POST[mem_user]'";
$result=mysqli_query($con,$sql);
$rows =mysqli_num_rows($result);
$i=0;
//เช็คusername ว่าซ้ำมั้ย
if($rows>$i){

    echo "<script>alert('username ซ้ำ');window.location ='index.php?Node=reg';</script>";
}

                
                    
                
else{
    mysqli_query($con, "INSERT INTO member (mem_name, mem_mobile, mem_user, mem_pass, mem_residence, mem_level)
                            VALUES ('$name', '$mobile','$username', '$pass', '$residence', '2')");

    echo "<script>alert('Complete');window.location ='index.php?Node=pagelogin';</script>";}
?>