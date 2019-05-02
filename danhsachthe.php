<?php session_start(); ?>
	
	<?php require("DBconnect.php") ;?>
	
	<?php 
	    $sql = "SELECT * FROM thenganhang where khachhangid=$_SESSION[khachhangid]";
		@$results = $control->query($sql);
	   
	
	?>		
<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT TÀI KHOẢN</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col">THẺ ID</th>      
                 <th width="105" scope="col">SỐ DƯ</th>
                 <th width="93" scope="col">MÃ PIN</th>
                 <th width="101" scope="col">CHỨNG MINH NHÂN DÂN</th>
                 <th width="144" scope="col">LOẠI THẺ</th>
				 <th width="144" scope="col">NỢ</th>  
                 
      </tr>
				<?php
				 while(@$the = $control->fetch_arr($results)){
					 
					 
					 @$sql = "SELECT * FROM loaithe where id_theloai=$the[loaithe]" ;
		             @$results_1 = $control->query($sql);
					 @$loai = $control->fetch_arr($results_1);
					 
					 echo "
                   <tr>
                    <td>&nbsp;$the[thenganhangid]</td>
                    <td>&nbsp;$the[sodu]</td>
                    <td>&nbsp;$the[passbin]</td>
                    <td>&nbsp;$the[cmnd]</td>	
					<td>&nbsp;$loai[tenloai]</td>	
                    <td>&nbsp;$the[no] </td>
                   
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?> 
   		   </table>
	</div> 
