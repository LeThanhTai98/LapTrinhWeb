<?php

session_start();
?>
	

	<?php require("DBconnect.php") ;?>
	
	<?php 
          $sql = "select * from khachhang where id_khachhang = $_SESSION[id_khachhang]" ;
         $resu = $control->query($sql);
         $arr = $control->fetch_arr($resu);


	    
		$results = mysqli_query($conn,"SELECT * FROM taikhoan where taikhoanid= $arr[taikhoanmacdinh]");
	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		$ngaytao = $arrow["ngaytao"];
		$sodu = $arrow["sodu"];
		$id_khachhang = $arrow["id_khachhang"];
		$trangthai = $arrow["trangthai"];
		$taikhoanid = $arrow["taikhoanid"];
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

<div align="center" >
	
     		 <h2>&nbsp;GIAO DỊCH GẦN ĐÂY</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col"> ID</th>      
                 <th width="105" scope="col">NGÀY TẠO</th>
                 <th width="93" scope="col">NGƯỜI CHUYỂN</th>
                 <th width="101" scope="col">NGƯỜI NHẬN</th>
                 <th width="144" scope="col">SỐ TIỀN</th>
                  <th width="144" scope="col">NỘI DUNG</th>
      </tr>
				<?php
				 $sql ="SELECT * FROM chuyentien where id_nhan = $_SESSION[taikhoanid] or id_chuyen = $_SESSION[taikhoanid] order by ngaytao desc limit 0,3";
					 $results = $control->query($sql);
				 while($taikhoan = $control->fetch_arr($results)){
					 
					
					 
					 echo "
                   <tr>
                    <td>&nbsp;$taikhoan[id_chuyentien]</td>     
                    <td>&nbsp;$taikhoan[ngaytao]</td>
                    <td>&nbsp;$taikhoan[id_chuyen]</td>
                    <td>&nbsp;$taikhoan[id_nhan]</td>
                    <td>&nbsp;$taikhoan[sotien]</td>
                     <td>&nbsp;$taikhoan[noidung]</td>
                  </tr>";
	  }
				 
				 
				 
				 
				 ?> 
   		   </table>
	</div> 
