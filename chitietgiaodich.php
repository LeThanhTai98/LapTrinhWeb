<?php require("DBconnect.php") ;?>
	
	<?php 
	    $sql = "SELECT * FROM chuyentien where id_chuyen = '11' or id_nhan = '11'";
		$results = $control->query($sql);
	
	?>		
<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT GIAO DỊNH</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col">NGÀY THỰC HIỆN</th>      
                 <th width="105" scope="col">NGƯỜI CHUYỂN</th>
                 <th width="93" scope="col">NGƯỜI NHẬN</th>
                 <th width="101" scope="col">SỐ TIỀN</th>
                 <th  width="144" scope="col">NỘI DỤNG</th>
                 
      </tr>
				<?php
				 while($giaodich = $control->fetch_arr($results)){
					 echo "
                   <tr>
                    <td>&nbsp;$giaodich[ngaytao]</td>
                    <td>&nbsp;$giaodich[id_chuyen]</td>
                    <td>&nbsp;$giaodich[id_nhan]</td>
                    <td>&nbsp;$giaodich[sotien]</td>
                    <td style='word-wrap: break-word;''>&nbsp;$giaodich[noidung]</td>
                   
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?> 
   		   </table>
	</div> 