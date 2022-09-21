<?php
include_once("condb.php");


function  ViewContent($Node=""){
if($Node==""){return "content_das.php";}
else if($Node=="home"){return "home.php";}
else if($Node=="pagelogin"){return "frmlogin.php";}
else if($Node=="reg"){return "register.php";}
else if($Node=="chk"){return "chklogin.php";}
else if($Node=="lout"){return "logout.php";}
else if($Node=="saveregis"){return "saveregis.php";}

//ผู้ใช้ แอดมิน
else if($Node=="showmem"){return "showmember.php";}
else if($Node=="showpeople"){return "showpeople.php";}
else if($Node=="addmem"){return "addmember.php";}
else if($Node=="editmem"){return "editmember.php";}
else if($Node=="editpro"){return "editprofile.php";}
else if($Node=="addpeople"){return "addpeople.php";}

//วัสดุ
else if($Node=="smat"){return "showmat.php";}
else if($Node=="amat"){return "addmat.php";}
else if($Node=="emat"){return "editmat.php";}
else if($Node=="stmat"){return "showtotalmat.php";}

//การคำนวณวัสดุ
else if($Node=="sdraw"){return "showdraw.php";}
else if($Node=="drawmat"){return "draw_mat.php";}
else if($Node=="hisdraw"){return "his_draw.php";}
else if($Node=="managedraw"){return "manage_draw.php";}
else if($Node=="managedraw"){return "manage_draw.php";} 
else if($Node=="restoredraw") {return "restore_draw.php";}


else {return "index.php";}
}


function isOnline(){
if(isset($_SESSION['usr']) && isset($_SESSION['pwd'])){
	return true;
}else{
	return false;
}
}



function isAdmin($usr=0,$pwd=0,$con=0){
	$sql="SELECT * FROM member WHERE mem_user='$usr' AND mem_pass='$pwd' ";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)<1){
		return false;
	}else{
		$info=mysqli_fetch_assoc($res);
		return $info['mem_level'] == 1 ? true : false;
	}
}


function isUser($usr=0,$pwd=0,$con=0){
	$sql="SELECT * FROM member WHERE mem_user='$usr' AND mem_pass='$pwd' ";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)<1){
		return false;
	}else{
		$info=mysqli_fetch_assoc($res);
		return $info['mem_level'] == 2 ? true : false;
	}
}



?>