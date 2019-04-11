<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Ngân Hàng STbank</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="img/ico" href="hinh/logo.ico">
</head>
	<div id="khung">
	   <?php require("Header.php") 
		?>	
		<?php require("Menu.php")?>
		<?php if (isset($_GET['ts']))
				  switch($_GET['ts'])
				  {
					  case "gt" : include("GioiThieu.php");break;
					  case "cn" : include("CaNhan.php");break;
					  case "ndt": include("NhaDauTu.php");break;
					  case "dn" : include("DoanhNghiep.php");break;
					  case "td" : include ("TuyenDung.php");break;
					  case "tt" : include("TinTuc.php");break;	  
				  }				  
				else  include("MainIndex.php")?>
		
	
	
		<?php require("Footer.php") ?>
	</div>	

<body>
</body>
</html>