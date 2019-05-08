<?php session_start(); ?>
	
<?php 
require ("DBconnect.php");
	    
		
		
	if (isset($_POST["pay"])){
		$sql = "UPDATE khachhang SET taikhoanmacdinh = '$_POST[taikhoanid]' where id_khachhang = '$_SESSION[id_khachhang]'";
		$a = $control->query($sql);
		if ($control->row_affected() == 1) {
			$_SESSION["taikhoanid"] = $_POST["taikhoanid"];
			echo "success";
		}
	}
		
?>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>CÀI ĐẶT TÀI KHOẢN MẶC DỊNH  </h2>
           	  <table width="591" height="177" border="1">
        	    
        	    <tr>
        	      <td><strong>CHỌN TÀI KHOẢN </strong></td>
        	      <td><label>
        	        <select name="taikhoanid" id="taikhoanid" >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]" ;
						
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
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
