
	<?php require("DBconnect.php") ;?>
	
	<?php 
	    
		$results = mysqli_query($conn,"SELECT * FROM taikhoan where taikhoanid='11'");
	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		$ngaytao = $arrow["ngaytao"];
		$sodu = $arrow["sodu"];
		$khachhangid = $arrow["khachhangid"];
		$trangthai = $arrow["trangthai"];
		$taikhoanid = '11';
		$i = 1;
	}
	?>		
	 <div align="center"  >
     		 <h2>&nbsp;</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr>
     		     <th colspan="2" scope="col">TÀI KHOẢN </th>
   		     </tr>
     		<tr>
     		     <td height="37">TÀI KHOẢN MẶC ĐỊNH </td>
     		     <td>&nbsp;<?php echo $taikhoanid ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="34">NGÀY TẠO</td>
     		     <td>&nbsp;<?php echo $ngaytao ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="39">SỐ DƯ</td>
     		     <td>&nbsp;<?php echo $sodu ; ?></td>
   		     </tr> 
   		   </table>
		
	</div> 
