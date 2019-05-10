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
$_SESSION['nguoinhan'] = $_POST["huongid"];
$payamt = $_POST["pay_amt"];
$taikhoanchuyen = $_POST["taikhoanid"];
	$code = taocode(4);
	$mail = new guimail($_SESSION["id_khachhang"]);
	$mail->gui($conn,$code);
	$passerr ="" ;
	echo $code ;
	$phi = new phichuyentien ($conn);
	$phi->setCon($conn);
    $phichuyentien = $phi->phichuyen($payamt);
	$nguoichiuphi = $_POST["nguoichiuphi"];
	$noidung = $_POST["noidung"];
}
	
?>
		
	<?php 
	

	$loi = 0 ;
	   if(isset($_POST["pay2"]))
  {   $sql ="SELECT * FROM khachhang where id_khachhang=$_SESSION[id_khachhang]";
      $results_3 = $control->query($sql);
      $arrpayment1 = $control->fetch_arr($results_3);
   
  
    //chuyen phai nguoi dung nhap sang harsh-password
	$auth = password_verify($_POST["trpass"],$arrpayment1["passchuyenkhoan"]);	
		
		
	if($auth and $_POST["email"] == $_POST["code"])
	{   
		$tien = new chuyentien($_POST["taikhoanid"]);
		$tien->setCon($conn);
		$tien->setphichuyen($_POST["phichuyentien"]);
		$demnguoinhan = 0 ;
		$demchuyentienthanhcong = 0 ;
		$demtruphi = 0 ;
		foreach  ($_SESSION['nguoinhan'] as $nguoinhan_1){	
	          if ($nguoinhan_1 != "" ) {
				  $demnguoinhan++;
				  echo $nguoinhan_1 ;
				 $a= @$tien->chuyen($nguoinhan_1,$_POST["amt"],$_POST["noidung"]);
				 if ($a == 1) $demchuyentienthanhcong++;	
				 if ($_POST["nguoichiuphi"] == 1)$b = @			$tien->trutiennguoichuyen();
	             else $b = $tien->trutiennguoinhan($nguoinhan_1);   
	             if (  $b == 1) $demtruphi++;
		            }   
		}
		if ($demchuyentienthanhcong == $demnguoinhan and $demtruphi == $demnguoinhan){
			unset($_SESSION['nguoinhan']);
			header("Location: formchuyentien3.php");}
																					 
	}
	else
	{
		$err1 = "";
		$err2 = "";
	if (!$auth) $err1 = "<b> <br>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["email"] != $_POST["code"])	$err2 = "<b>  <br>mã xác nhận email không đúng</b>";
	$passerr = $err1.$err2." <br>vui lòng nhập lại";

	
	$payamt = $_POST["amt"];
	$taikhoanchuyen = $_POST["taikhoanid"];
	$code = $_POST["code"];
	$phichuyentien = $_POST["phichuyentien"];
	$nguoichiuphi = $_POST["nguoichiuphi"];
		$noidung = $_POST["noidung"];
	}		
  /* ngoac cua pay2*/}
      $dem1 =0;
		$dem2=0;
		if(isset($_SESSION['nguoinhan']) ){
		foreach  ($_SESSION['nguoinhan'] as $nguoinhan_1){
			$dem1++;
		if ($nguoinhan_1 != "" )$dem2++; 
			
		}
			if ($dem2 == 0) $loi++;
		}
		else $loi++;
		if ($payamt == 0) $loi++; 
?>
	
   <?php  if ($loi != 1)
{ ?>
	<form id="form1" name="form1" method="post" action="formchuyentientaikhoanhuong2.php">     
     	
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
                  <td width="203"><strong> NGƯỜI NHẬN</strong></td>
                  <td width="322">
				  <?php
				foreach  ($_SESSION['nguoinhan'] as $nguoinhan_1){
			
	             	if ($nguoinhan_1 != "" ){
                    $sql ="SELECT * FROM taikhoan where taikhoanid=$nguoinhan_1"; 	
						$resu = $control->query($sql);
					  $arr = $control->fetch_arr($resu);
					$sql2 ="SELECT * FROM khachhang where id_khachhang=$arr[id_khachhang]"; 	
						$resu2 = $control->query($sql2);
						$arr2 = $control->fetch_arr($resu2);
				echo "<br><b>&nbsp;TÊN : </b>".$arr2["ho"]."  ".$arr2["ten"];
				echo "<br><b>&nbsp;TÀI KHOẢN ID : </b>".$arr["taikhoanid"];			
				echo "<br><b>&nbsp;TRẠNG THÁI : </b>".$arr2["trangthai"];
				echo "<br>";		
				
						
		            }   
		            }
		
	
                  ?>
                  
<input type="hidden" name="payto3" value="<?php echo $nguoinhan; ?>"  />
<input type="hidden" name="amt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="taikhoanid" value="<?php echo $taikhoanchuyen; ?>"  />
<input type="hidden" name="code" value="<?php echo $code; ?>"  />	
<input type="hidden" name="phichuyentien" value="<?php echo $phichuyentien; ?>"  />
<input type="hidden" name="nguoichiuphi" value="<?php echo $nguoichiuphi; ?>"  />						  <input type="hidden" name="noidung" value="<?php echo $noidung; ?>"  />					  

				  </td>
                </tr>
                <tr>
                  <td><strong>SỐ TIỀN CHUYỀN</strong></td>
                  <td>&nbsp;<?php echo number_format($payamt,2); ?></td>
                </tr>
                 <tr>
                  <td><strong>PHÍ CHUYỂN TIỀN </strong></td>
                  <td>&nbsp;<?php echo number_format($phichuyentien,2); ?>
				  <?php if ($nguoichiuphi == 1 ) $chiu ="<br><b> người chuyển trả</b>";
                                  else $chiu = "<br><b>người nhận trả</b>";
                      echo $chiu ; ?></td>	 
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
		else echo " da xay ra loi xin hay kiem tra lai thong tin nhap "; 
		?>
		<?php require("Footer.php") ;?>
</div>
</body>
</html>