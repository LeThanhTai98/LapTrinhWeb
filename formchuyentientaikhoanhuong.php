<?php session_start(); ?>
	<?php 
require ("DBconnect.php");
	
?>


<form id="form1" name="form1" method="post" action="formchuyentientaikhoanhuong2.php">
  
     	<h2>CHUYỂN TIỀN TÀI KHOẢN HƯỞNG </h2>
           	  <table width="591" height="177" border="1">
        	    <tr>
        	      <td><strong>SỐ LƯỢNG CHUYỂN </strong></td>
        	      <td><label>
        	        <input type="number" name="pay_amt" id="pay_amt"  />
      	        </label></td>
      	      </tr>
				  <tr>
        	       <td><strong>CHỌN TÀI KHOẢN HƯỞNG</strong></td>
        	      <td><label>
        	        <select name="huongid[]" id="huongid" multiple="multiple"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql = "SELECT * FROM taikhoanhuong where khachhangid=$_SESSION[khachhangid]" ;
						
						$results_1 = $control->query($sql);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{
							
							echo "<option value='$rowsacc[taikhoanhuongid]'>$rowsacc[taikhoanhuongid]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>CHỌN TÀI KHOẢN</strong></td>
        	      <td><label>
        	        <select name="taikhoanid" id="taikhoanid">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$results_1 = mysqli_query($conn,"SELECT * FROM taikhoan where khachhangid=$_SESSION[khachhangid] and trangthai = 2");
						while($rowsacc = mysqli_fetch_array($results_1,MYSQLI_ASSOC))
						{
							
							echo "<option value='$rowsacc[taikhoanid]'>$rowsacc[taikhoanid]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
	            
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
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
