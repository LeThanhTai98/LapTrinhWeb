<?php session_start() ;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Ngân Hàng STbank</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="img/ico" href="hinh/logo.ico">
		<style>	
	.account{border: solid;
	border-color: blue;
	border-width: 1px;
	background-color: #29a0c7;
	padding: 3px;
	text-align: center;
	font-weight: bolder;
	border-radius: 50px;
	color: white;
	width: 290px;
		height: 35px; }</style>
</head>
<body>
	

	<?php require("Header.php") ;?>
	 <?php require ("accmenu.php") ;
	  
	require("DBconnect.php")
	;?>
	
    <?php
	$sql = "SELECT @@event_scheduler";
	$kq = $control->query($sql);
	$arr = $control->fetch_arr($kq);
	foreach($arr as $tem){
		echo $tem ;
	}
	$sql = "CREATE EVENT IF NOT EXISTS event_tienvay 
	        ON SCHEDULE EVERY 1 DAY 
			DO 
			UPDATE vaytien a JOIN taikhoan b ON u.taikhoanid = b.taikhoanid set no = no + sovay*laixuat ";
	$kq = $control->query($sql);
	$sql ="SHOW EVENTS FROM test";
	$kq = $control->query($sql);
	while ($arr = $control->fetch_arr($kq))
	foreach($arr as $tem){
		echo $tem ;
	}
	
	
	/*$sql= "select * from khachhang";
	$kq = $control->query($sql);
	while ($arr = $control->fetch_arr($kq)){
		$pass = '2';	
		$harsh =password_hash($pass,PASSWORD_DEFAULT);
		echo $harsh."<br>";
		$sql = "update khachhang set pass = '$harsh' where khachhangid = '$arr[khachhangid]'";
		$control->query($sql);
		if ($control->row_affected() == 1) echo "success";
		$harsh_1 = $control->passharsh($pass);
		$sql = "update khachhang set passchuyenkhoan = '$harsh_1' where khachhangid = '$arr[khachhangid]'";
		$control->query($sql);
		if ($control->row_affected() == 1) echo "success";
	}*/
	?>
	
	
	
	
	
	<?php require("Footer.php") ;?>
</body>
</html>