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
		require ("DBconnect.php");
		?>
	<?php	if(isset($_POST["pay"]))
{
$nguoinhan = $_POST["payto"];
$payamt = $_POST["pay_amt"];
$taikhoanchuyen = $_POST["taikhoanid"];
	$code = taocode(4);
	$mail = new guimail("11");
	$mail->gui($conn,$code);
	$passerr ="" ;
	echo $code ;
}
	
?>
		
	<?php 
	

	$loi = 0 ;
	   if(isset($_POST["pay2"]))
  {   $sql3 = "SELECT * FROM khachhang where khachhangid='11'";
	  $results_3 = $control->query($sql3);
      $arrpayment1 = $control->fetch_arr($results_3);
   
   
    
		
		
	if($_POST["trpass"] == $arrpayment1["passchuyenkhoan"] and $_POST["email"] == $_POST["code"])
	{   $tien = new chuyentien($_POST["taikhoanid"]);
	    $tien->setCon($conn);
	    $a = $tien->chuyen($_POST["payto3"],$_POST["amt"]);	  
	    if ($a == 1) header("Location: formchuyentien3.php");
	}
	else
	{
		$err1 = "";
		$err2 = "";
	if ($_POST["trpass"] != $arrpayment1["passchuyenkhoan"]) $err1 = "<b>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["email"] != $_POST["code"])	$err2 = "<b> mã xác nhận email không đúng</b>";
	$passerr = $err1." ; ".$err2." <br>vui lòng nhập lại";

	$nguoinhan = $_POST["payto3"];
	$payamt = $_POST["amt"];
	$taikhoanchuyen = $_POST["taikhoanid"];
	$code = $_POST["code"];
	}		  
}       
		if(isset($nguoinhan) and $nguoinhan != ""){
		$sql = "SELECT * FROM taikhoan where taikhoanid=$nguoinhan" ;
		$results_1 = $control->query($sql);
		$array = $control->fetch_arr($results_1);
		if (!isset($array["taikhoanid"]))
		{
			 echo "loi 1" ;
		$loi++ ;
		}
		else {
			
	    $results = mysqli_query($conn,"SELECT * FROM taikhoan where taikhoanid='11'");
        $nguoinhan_1 = $array["khachhangid"];
		$sql2 = "SELECT * FROM khachhang where khachhangid=$nguoinhan_1" ;
	    $results_2 = $control->query($sql2);	
	    $arrpayment = $control->fetch_arr($results_2	);
		}
		}
		else {$loi++;
			  echo "loi 2" ;}
?>
	
   <?php echo $loi ;  
		if ($loi == 0)
{ ?>
	<form id="form1" name="form1" method="post" action="formchuyentien2.php">     
     	<h2>&nbsp;NGƯỜI NHẬN <?php echo $arrpayment["ho"]."  ".$arrpayment["ten"]; ?></h2>
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
                  <td width="203"><strong>THÔNG TIN NGƯỜI NHẬN</strong></td>
                  <td width="322">
				  <?php
				echo "<b>&nbsp;TÊN : </b>".$arrpayment["ho"]."  ".$arrpayment["ten"];
				echo "<br><b>&nbsp;TÀI KHOẢN ID : </b>".$array["taikhoanid"];			
				echo "<br><b>&nbsp;TRẠNG THÁI : </b>".$arrpayment["trangthai"];
	
                  ?>
                  
<input type="hidden" name="payto3" value="<?php echo $nguoinhan; ?>"  />
<input type="hidden" name="amt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="taikhoanid" value="<?php echo $taikhoanchuyen; ?>"  />
<input type="hidden" name="code" value="<?php echo $code; ?>"  />					  
				  </td>
                </tr>
                <tr>
                  <td><strong>SỐ TIỀN CHUYỀN</strong></td>
                  <td>&nbsp;<?php echo number_format($payamt,2); ?></td>
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
  </body>
</html>
