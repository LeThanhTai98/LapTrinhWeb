
<?php 
require ("DBconnect.php");
	
	    
		$results = mysqli_query($conn,"SELECT * FROM taikhoan where taikhoanid='11'");
	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		$ngaytao = $arrow["ngaytao"];
		$sodu = $arrow["sodu"];
		$khachhangid = $arrow["khachhangid"];
		$trangthai = $arrow["trangthai"];
	}
		
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
        	        <input type="text" name="pay_amt" id="pay_amt" size="25" />
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>CHỌN TÀI KHOẢN</strong></td>
        	      <td><label>
        	        <select name="taikhoanid" id="taikhoanid">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$results_1 = mysqli_query($conn,"SELECT * FROM taikhoan where taikhoanid='11'");
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
            