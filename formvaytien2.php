<?php

session_start();
?>

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
	
		<body bgcolor="lightblue" >
	<div id="khung" >
		<?php require("Header.php") ;?>
	 <?php require ("accmenu.php") ;
		require ("DBconnect.php");
		?>
	<?php	if(isset($_POST["pay"]))
{
    $kieuvay = $_POST["kieuvay"];
    $vayamt = $_POST["vay_amt"];
    $taikhoanvay = $_POST["taikhoanid"];
	$code = taocode(4);
	$mail = new guimail($_SESSION["id_khachhang"]);
	$mail->gui($conn,$code);
	$passerr ="" ;
	echo $code ;
	echo $kieuvay;
}
	
?>
		
	<?php 
	
  $results_4 = mysqli_query($conn,"SELECT * FROM kieuvay where id_kieuvay=$_POST[kieuvay]");
	$array_4 = mysqli_fetch_assoc($results_4);
		
		
		
	$loi = 0 ;
		
		
	   if(isset($_POST["pay2"]))
  {   $results_3 = mysqli_query($conn,"SELECT * FROM khachhang where id_khachhang=$_SESSION[id_khachhang]");
      $arrpayment1 = mysqli_fetch_assoc($results_3);	
   
   //chuyen phai nguoi dung nhap sang harsh-password
	$auth = password_verify($_POST["trpass"],$arrpayment1["passchuyenkhoan"]);	
   
	if($auth and $_POST["email"] == $_POST["code"])
		
		
		
	{   $demthanhcong=0;
		$vay = new vaytien($_POST["taikhoanid"]);
		$a=$vay->vay($conn,$_POST["amt"],$_POST["kieuvay"]);
		if ($a == 1)$demthanhcong++;
	 
	    $sql = "update taikhoan set no = $_POST[amt] +($_POST[amt]*$array_4[laixuat]) where taikhoanid = $_POST[taikhoanid] ";
	    $resu = $control->query($sql);
	    $a = $control->row_affected();
	    if ($a == 1)$demthanhcong++;
	 
	 
	    if ($demthanhcong == 2) header("Location: formchuyentien3.php");
	}
   
   
   
	else
	{
		$err1 = "";
		$err2 = "";
		
		
	if (!$auth) $err1 = "<b> <br>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["email"] != $_POST["code"])	$err2 = "<b> <br> mã xác nhận email không đúng</b>";
	$passerr = $err1.$err2." <br>vui lòng nhập lại";

		
		
	$kieuvay = $_POST["kieuvay"];
	$vayamt = $_POST["amt"];
	$taikhoanvay = $_POST["taikhoanid"];
	$code = $_POST["code"];
	}		  
    }       
		
	$results_4 = mysqli_query($conn,"SELECT * FROM kieuvay where id_kieuvay=$kieuvay");
	$array_4 = mysqli_fetch_assoc($results_4);
		if ($vayamt < $array_4["toithieu"] or $vayamt > $array_4["toida"]) {
			$loi++ ;
		}
		if ($kieuvay == "") $loi++;
?>
	
   <?php  if ($loi < 1)
{ ?>
	<form id="form1" name="form1" method="post" action="formvaytien2.php">     
     	
              <table width="564" height="220" border="1">
                <?php
				if($passerr != "")
				{
					?>
                <tr>
                  <td colspan="2">&nbsp;<?php echo $passerr; ?></td>
                </tr>
                <?php
				}
				?>
                <tr>
                  <td width="203"><strong>THÔNG TIN VAY</strong></td>
                  <td width="322">
				  <?php
	
				echo "<b>&nbsp;KIÊU VAY : </b>".$array_4["kieuvay"];
				echo "<br><b>&nbsp;SỐ LƯỢNG VAY : </b>".$vayamt;			
				echo "<br><b>&nbsp;TÀI KHOẢN VAYY : </b>".$taikhoanvay;
	
                  ?>
                  
<input type="hidden" name="kieuvay" value="<?php echo $kieuvay; ?>"  />
<input type="hidden" name="amt" value="<?php echo $vayamt; ?>"  />
<input type="hidden" name="taikhoanid" value="<?php echo $taikhoanvay; ?>"  />
<input type="hidden" name="code" value="<?php echo $code; ?>"  />					  
				  </td>
                </tr>         
                <tr>
                  <td><strong>NHẬP MẬT KHẨU CHUYỂN KHOẢN</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" /></td>
                </tr>
                <tr>
                  <td><strong>XÁC NHẬN MẬT KHẨU </strong></td>
                  <td><input name="conftrpass" type="password" id="conftrpass" size="35" /></td>
                </tr>
				  <tr>
                  <td><strong>XÁC NHẬN EMAIL </strong></td>
                  <td><input name="email" type="test" id="email" size="35" /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                    <input name="button" type="button"  value="Cancel" alt="Pay Now" />
                  </div></td>
                </tr>
              </table>
		<?php }
		else {
			
		
		
		if ($vayamt < $array_4["toithieu"] or $vayamt > $array_4["toida"]) {
			echo "<br>"."số tiền vay không phù hợp";
		}	
			
			
		} 
		?>
		<?php require("Footer.php") ;?>
 </div>
</body>
</html>