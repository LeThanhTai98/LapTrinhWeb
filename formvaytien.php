<?php

session_start();
?>
<?php 
require ("DBconnect.php");
	
	    
		$results = mysqli_query($conn,"SELECT * FROM taikhoan where khachhangid=$_SESSION[khachhangid]");
	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		$ngaytao = $arrow["ngaytao"];
		$sodu = $arrow["sodu"];
		$khachhangid = $arrow["khachhangid"];
		$trangthai = $arrow["trangthai"];
	}
		
?>


<form id="form1" name="form1" method="post" action="formvaytien2.php">
  
     	<h2>VAY</h2>
           	  <table width="591" height="177" border="1">
        	    <tr>
        	      <td><strong>LOẠI VAY</strong></td>
        	      <td><label>
        	            <select name="kieuvay" id="kieuvay">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$results_1 = mysqli_query($conn,"SELECT * FROM kieuvay ");
						while($rowsacc = mysqli_fetch_array($results_1,MYSQLI_ASSOC))
						{
							
							echo "<option value='$rowsacc[id_kieuvay]'>$rowsacc[kieuvay] $rowsacc[toithieu]->$rowsacc[toida]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>SỐ LƯỢNG VAY </strong></td>
        	      <td><label>
        	        <input type="text" name="vay_amt" id="vay_amt" size="25" />
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>CHỌN TÀI KHOẢN</strong></td>
        	      <td><label>
        	        <select name="taikhoanid" id="taikhoanid">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$results_1 = mysqli_query($conn,"SELECT * FROM taikhoan where khachhangid=$_SESSION[khachhangid] and trangthai = 2 and no = 0");
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
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>