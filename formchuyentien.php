<?php session_start(); ?>
<?php 
require ("DBconnect.php");
	
	    
		
		
?>


<form id="form1" name="form1" method="post" action="formchuyentien2.php">
  
     	<h2>CHUYỂN TIỀN </h2>
           	  <table width="591" height="177" border="1">
        	    <tr>
        	      <td><strong>MÃ TÀI KHOẢN NHẬN</strong></td>
        	      <td><label>
        	       <input type="text" name="payto" id="payto" size="25">
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>SỐ LƯỢNG CHUYỂN </strong></td>
        	      <td><label>
        	        <input type="number" name="pay_amt" id="pay_amt" size="25" />
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>CHỌN TÀI KHOẢN</strong></td>
        	      <td><label>
        	        <select name="taikhoanid" id="taikhoanid">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$results_1 = mysqli_query($conn,"SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang] and trangthai = 2");
						while($rowsacc = mysqli_fetch_array($results_1,MYSQLI_ASSOC))
						{
							
							echo "<option value='$rowsacc[taikhoanid]'>$rowsacc[taikhoanid]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
	            </tr>
                  <tr>
        	      <td><strong>NGƯỜI CHỊU PHÍ CHUYỂN TIỀN </strong></td>
        	      <td><label>
        	        
					  <select name="nguoichiuphi" id="nguoichiuphi">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			
							
							<option value="1"> người chuyển </option>
						     <option value="2"> người nhận </option>
						
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>NỘI DUNG GIAO DỊCH </strong></td>
        	      <td><label>
        	        
					  <textarea name="noidung" id="noidung" rows="5" cols="30"> </textarea>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="TIẾP THEO" />
        	      </div></td>
       	        </tr>
      	    </table>
            
