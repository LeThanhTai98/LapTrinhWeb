
<?php 
require ("DBconnect.php");
	
	$passerr="";
	 $dem = 0 ;
   $sql = "SELECT * FROM taikhoantietkiem where taikhoanid='11'" ;				
   $results_1 = $control->query($sql);			
   if($rowsacc = $control->fetch_arr($results_1))
	{
							
						
   
	if (isset($_POST["pay"])){
		
		$sql11 = "select * from taikhoan where taikhoanid = $_POST[taikhoanid]" ;
		$j = $control->query($sql11);
		$i = $control->fetch_arr($j);
		
		
		
		
		if ($i["sodu"] >= $_POST["gui_amt"] and $_POST["gui_amt"] != 0 ){
		
		$sql1 = "update taikhoantietkiem set tiengui = tiengui + $_POST[gui_amt] where taikhoanid = $_POST[taikhoanid]" ;
		$d = $control->query($sql1);
	    $c = $control->row_affected();
		if($c == 1 ) header("Location: formchuyentien3.php"); 
		 
		}
		
			
		if ($i["sodu"] < $_POST["gui_amt"]) $passerr .= "số tiền trong tài khoản không đủ";
		if ($_POST["gui_amt"] == 0) $passerr .= "chưa nhập số tiền gửi";
 		
	}
   }
else $dem = 1 ;
?>

<?php if ($dem != 1){ ?>
<form id="form1" name="form1" method="post" action="">
  
     	<h2>THÊM TIỀN VÀO TÀI KHOẢN HƯỞNG </h2>
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
        	      <td><strong>TÀI KHOẢN CẦN THÊM </strong></td>
        	   <td><label>
        	        <select name="taikhoanid" id="taikhoanid"   >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql = "SELECT * FROM taikhoantietkiem where taikhoanid='11'" ;
						
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
				  <td><strong> SỐ TIỀN GỬI</strong></td>
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
	else  header("Location:motaikhoantietkiem.php");
	
	
	
	
	
	?>