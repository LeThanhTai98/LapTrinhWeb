<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	
<?php 
require ("DBconnect.php");
	
	$passerr="";
	 $dem = 0 ;
   $sql = "SELECT * FROM thenganhang where id_khachhang=$_SESSION[id_khachhang]" ;				
   $results_1 = $control->query($sql);			
   if($rowsacc = $control->fetch_arr($results_1))
	{
							
						
   
	if (isset($_POST["pay"])){
		
		$sql11 = "select * from taikhoan where id_taikhoan = $_POST[taikhoanid] and trangthai = 2" ;
		$j = @$control->query($sql11);
		$i = @$control->fetch_arr($j);
		
		
		
		$sql12 = "select * from thenganhang where thenganhangid = $_POST[theid]";
		$k = $control->query($sql12);
		$l = $control->fetch_arr($k);
		
		
		
		if ($i and $l ){
			
				
		if ($l["sodu"] >= $_POST["gui_amt"] and $_POST["gui_amt"] != 0 ){
		$demthanhcong= 0;
			
		$sql1 = "update thenganhang set sodu = sodu - $_POST[gui_amt] where thenganhangid = $_POST[theid]" ;
		$d = $control->query($sql1);
	    $c = $control->row_affected();
		if($c == 1 ) $demthanhcong++; 	
		
		$sql10 = "update taikhoan set sodu = sodu + $_POST[gui_amt] where taikhoanid = $_POST[taikhoanid]" ;	
		$d1 = $control->query($sql10);
	    $c1 = $control->row_affected();
		if($c1 == 1 ) $demthanhcong++; 	
			
			
		if($demthanhcong == 2 ) header("Location: formchuyentien3.php"); 
		 
		}
		
			
		if ($l["sodu"] < $_POST["gui_amt"]) $passerr .= "số tiền trong thẻ không đủ";
		if ($_POST["gui_amt"] == 0) $passerr .= "chưa nhập số tiền gửi";
			
		}
		
		else  {
			
			if (!$i)$passerr .= " không có tài khoản ;";
			if (!$l)$passerr .= " không có thẻ ;";
			
			  }
		
	}
	   
	   
   }
else $dem = 1 ;
?>

<?php if ($dem != 1){ ?>
<form id="form1" name="form1" method="post" action="">
  
     	<h2>CHUYỂN TIỀN VÀO TÀI KHOẢN </h2>
           	  <table width="591" height="177" border="1">
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
        	      <td><strong>THẺ CẦN CHUYỂN </strong></td>
        	   <td><label>
        	        <select name="theid" id="theid"   >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql = "SELECT * FROM thenganhang where id_khachhang=$_SESSION[id_khachhang] " ;
						
						$results_1 = $control->query($sql);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{
							
							echo "<option value='$rowsacc[thenganhangid]'>$rowsacc[thenganhangid]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
        	      <td><strong>TÀI KHOẢN CHUYỂN </strong></td>
        	   <td><label>
        	        <select name="taikhoanid" id="taikhoanid"   >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang] and trangthai = 2 " ;
						
						$results_1 = $control->query($sql);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{
							
							echo "<option value='$rowsacc[taikhoanid]'>$rowsacc[taikhoanid]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
				  <td><strong> SỐ TIỀN CHUYỂN </strong></td>
					  <td><label>
						  <input type="number" name="gui_amt" id="gui_amt">
						  </label>
					  </td>
				  </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
<?php }
	else  echo "khong co the ngan hang ";
	
	
	
	
	
	?>

</body>
</html>