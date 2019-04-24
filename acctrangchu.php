<!doctype html>
<html>
<head>
<meta charset="utf-8">

	<title>Ngân Hàng STbank</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="img/ico" href="hinh/logo.ico">
	<style>.account11{
		border: solid;
	border-color: blue;
	border-width: 1px;
	background-color: #29a0c7;
	padding: 3px;
	text-align: center;
	font-weight: bolder;
	border-radius: 50px;
	color: white;
	width: 290px;
	min-height: 35px;
	word-wrap: break-word;}</style>
</head>
	
<body bgcolor="lightblue" >
	<div id="khung" >
	<?php require("Header.php") ;?>
	 <?php require ("accmenu.php") ;?>
	 <?php if (isset($_GET['ts']))
				  switch($_GET['ts']) 
				  {
					  case "tk" : require("chitietkhachhang.php");
						  break ;
					  case "vt" : require("formvaytien.php");
						  break;
					  case "ck" : require("chuyenkhoan.php");
						  break;
					  case "tn"	: require ("trano.php");  
						  break;
					  case "dstk" : require("danhsachtaikhoan.php");
						  break ;
					  case "ctkh" : require("chitietkhachhang.php");
						  break;
					  case "ctgd" : require("chitietgiaodich.php");
						  break ;
					  case "xn" : require("xemno_1.php");
						 break ;
					  case "ct1" : require("formchuyentien.php");
						  break ;
					  case "ct2" : require("formchuyentientaikhoanhuong.php");
						  break;
					  
					  case "tk2" : require("themtienvaotaikhoantietkiem.php");
						  break;
					  case "tk3":  require("ruttientaikhoantietkiem.php");
						  break;
						 
				  }
		 else require("soluottaikhoan.php");
		?>
		
 <?php require("Footer.php") ;?>
	</div>
</body>
</html>