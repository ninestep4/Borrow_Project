<?php
session_start();
include_once("lib/condb.php");
include_once("lib/inc.php");

if (isset($_POST['btlogin'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql1 = "SELECT * FROM member WHERE mem_user='$user' AND mem_pass='$pass' ";
	$res1 = mysqli_query($con, $sql1);
	$row1 = mysqli_num_rows($res1);

	if ($row1 <= 0) {

		echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด');window.location ='index.php?Node=pagelogin';</script>";
		//echo '<meta http-equiv="refresh" content="0; url=index.php?Node=pagelogin">';

		exit;
	} else {

		$sql2 = "SELECT * FROM member WHERE mem_user='$user' AND mem_pass='$pass' ";
		$res2 = mysqli_query($con, $sql2);
		$row2 = mysqli_fetch_assoc($res2);
		$memid = $row2['mem_id'];
		$memuser = $row2['mem_user'];
		$mempass = $row2['mem_pass'];

		$_SESSION['usr'] = $user;
		$_SESSION['pwd'] = $pass;
		$_SESSION['memid'] = $memid;
	}

	echo "<script>alert('ลงชื่อเข้าใช้สำเร็จ');window.location ='index.php';</script>";
	//echo '<meta http-equiv="refresh" content="0; url=index.php">';
	exit;
}
