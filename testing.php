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
	<?php 
	function highlightKeywords($text, $keyword) {
		$wordsAry = explode(" ", $keyword);
		$wordsCount = count($wordsAry);
		
		for($i=0;$i<$wordsCount;$i++) {
			$highlighted_text = "<span style='font-weight:bold;'>$wordsAry[$i]</span>";
			$text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
		}

		return $text;
	}
?>

	<?php require("Header.php") ;?>
	 <?php require ("accmenu.php") ;
	  
	require("DBconnect.php")
	;?>
	
    <?php
	for($i=0;$i<50;$i++)
	{   $code = taocode(4);
		$sql = "INSERT INTO taikhoan VALUES ('','$code',3,2,now(),100000,0)";
	    $a =$control->row_affected();
	 if ($a == 1 ) echo "success";
	 else echo "fail";
	}
	?>
	
	<?php require("Footer.php") ;?>
</body>
</html>