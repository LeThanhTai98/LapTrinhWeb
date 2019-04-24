<?php require("DBconnect.php") ;?>
	
	<?php 
	    $sql = "SELECT * FROM taikhoan where khachhangid='11'";
		$results = $control->query($sql);
	
	?>		
<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT TÀI KHOẢN</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col">TÀI KHOẢN ID</th>      
                 <th width="105" scope="col">TRANG THÁI</th>
                 <th width="93" scope="col">NGÀY TẠO</th>
                 <th width="101" scope="col">SỐ DƯ</th>
                 <th width="144" scope="col">NỢ</th>
                 
      </tr>
				<?php
				 while($taikhoan = $control->fetch_arr($results)){
					 echo "
                   <tr>
                    <td>&nbsp;$taikhoan[taikhoanid]</td>
                    <td>&nbsp;$taikhoan[trangthai]</td>
                    <td>&nbsp;$taikhoan[ngaytao]</td>
                    <td>&nbsp;$taikhoan[sodu]</td>
                    <td>&nbsp;$taikhoan[no]</td>
                   
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?> 
   		   </table>
	</div> 