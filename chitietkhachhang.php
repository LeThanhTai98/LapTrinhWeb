<?php session_start(); ?>
	
<?php require("DBconnect.php") ;?>
	
	<?php 
	   
		$results = mysqli_query($conn,"SELECT * FROM khachhang where id_khachhang=$_SESSION[id_khachhang]");
	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		$ngaytao = $arrow["ngaytao"];
		$ho = $arrow["ho"];
		$ten = $arrow ["ten"];
		$loginid = $arrow["loginid"];
		$id_khachhang = $arrow["id_khachhang"];
		$trangthai = $arrow["trangthai"];
		$email = $arrow ["email"];
		
	}
	?>		
<div align="center" >
	
     		 <h2>&nbsp;</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr>
     		     <th colspan="2" scope="col">CHI TIẾT TÀI KHOẢN </th>
   		     </tr>
				 <tr>
     		     <td height="37"> MÃ KHÁCH HÀNG</td>
     		     <td>&nbsp;<?php echo $id_khachhang; ?></td>
   		     </tr>
     		<tr>
     		     <td height="37"> HỌ TÊN</td>
     		     <td>&nbsp;<?php echo $ho." ".$ten; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="34">TÀI KHOẢN ĐĂNG NHẬP</td>
     		     <td>&nbsp;<?php echo $loginid ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="39">TRẠNG THÁI</td>
     		     <td>&nbsp;<?php echo $trangthai ; ?></td>
				 </tr>
				 <tr>
     		     <td height="39">NGÀY TẠO</td>
     		     <td>&nbsp;<?php echo $ngaytao ; ?></td>
   		     </tr>   
   		     </tr>
				 <tr>
     		     <td height="39">EMAIL</td>
     		     <td>&nbsp;<?php echo $email ; ?></td>
   		     </tr>
				 
   		   </table>
	</div> 