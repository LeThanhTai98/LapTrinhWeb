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
	<div id="khung">
	<?php require("Header.php") ;?>
	 <?php require ("accmenu.php") ;?>
	 <?php if (isset($_GET['ts']))
				  switch($_GET['ts']) 
				  {
					  case "tk" : require("chitietkhachhang.php");
						  break ;
					  case "vt" : require("vaytien.php");
						  break;
					  case "ck" : require("chuyenkhoan.php");
						  break;
					  case "tn"	: require ("trano.php");  
						  break;
				  }
		 else require("soluottaikhoan.php");
		?>
 <?php require("Footer.php") ;?>
	</div>
</body>
</html>