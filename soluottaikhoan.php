
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
		 <h2>&nbsp;</h2>
     		 <table width="700" border="1"  align="center">
     		   <tr>
     		     <th colspan="5" scope="col">LỊCH SỬ CHUYỂN KHOẢN </th>
   		     </tr>
				 <?php
				 $sql = "select * from chuyentien where id_nhan = $taikhoanid or id_chuyen = $taikhoanid";
				 $a = $control->query($sql);
				 while ($b = $control->fetch_arr($a)){
					 ?>
					 
				 <tr>   
					 <td> ngày tạo : <?php echo $b["ngaytao"]; ?></td>
					 <td> người chuyển : <?php echo $b["id_chuyen"];?></td>
					 <td> người nhận : <?php echo $b["id_nhan"];?></td>
					 <td> số tiền : <?php echo $b["sotien"];?></td>
					 <td style="max-width: 200 ; word-wrap: break-word;"> nội dung : <?php echo $b["noidung"];?></td>
				 </tr>
				 <?php
					
					 if ($i == 2 ) break ;
					$i++ ;
				 }
				?>
   		   </table>
	</div> 
