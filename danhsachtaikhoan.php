<?php session_start(); ?>
	
	
<?php require("DBconnect.php") ;?>
	
	<?php 
	    $sql = "SELECT * FROM taikhoan where khachhangid=$_SESSION[khachhangid]";
		
	
	?>		




<form id="form1" name="form1" method="post" action="" >
  
     	
           	  <table width="591" height="177" border="1" align="center">
        	    
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="taikhoan" id="taikhoan" onchange="form1.submit()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql =  $sql = "SELECT * FROM taikhoan where khachhangid=$_SESSION[khachhangid]"; ;
						
						$results_1 = $control->query($sql);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>
							
							<option value='<?php echo $rowsacc["taikhoanid"]; ?>' 
									<?php if (isset($_POST["taikhoan"]) and $_POST["taikhoan"] != "" and $_POST["taikhoan"] == $rowsacc["taikhoanid"]) echo "selected ='selected'";?>> <?php echo  $rowsacc["taikhoanid"];?></option>";
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
        	      <td><strong>TRẠNG THÁI </strong></td>
        	   <td><label>
        	        <select name="trangthai" id="trangthai"  onchange="form1.submit()" >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
						
						
        	 			    <option value="1" <?php if( isset($_POST["trangthai"]) and $_POST["trangthai"] != "" and $_POST["trangthai"] == 1 ) echo "selected = 'selected'" ?> >
								tạm ngừng</option>
						
						
						    <option value="2" <?php if (isset($_POST["trangthai"]) and $_POST["trangthai"] != "" and $_POST["trangthai"] == 2 ) echo "selected = 'selected'" ?> > đang hoạt động</option>
						
						
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
				  <td><strong> SỐ DƯ LỚN HỞN x </strong></td>
					  <td><label>
						  <input type="number" name="lonhon_amt" id="amt" value="<?php if(isset($_POST["lonhon_amt"])) echo $_POST["lonhon_amt"] ;?>" onchange="form1.submit()">
						  </label>
					  </td>
				  </tr>
				    <tr>
				  <td><strong> SỐ DƯ BÉ HỞN x </strong></td>
					  <td><label>
						  <input type="number" name="behon_amt" id="amt" value="<?php if(isset($_POST["behon_amt"])) echo $_POST["behon_amt"] ;?>" onchange="form1.submit()">
						  </label>
					  </td>
				  </tr>
        	        <tr>
				  <td><strong> SỐ NỢ BÉ HỞN x </strong></td>
					  <td><label>
						  <input type="number" name="behon_no_amt" id="amt" value="<?php if(isset($_POST["behon_no_amt"])) echo $_POST["behon_no_amt"] ;?>" onchange="form1.submit()">
						  </label>
					  </td>
				  </tr>
				  
	</table>
					
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
				 if (isset($_POST["taikhoan"]) and $_POST["taikhoan"] != "") $sql .=  " and taikhoanid = $_POST[taikhoan]";
				 
				 if (isset($_POST["trangthai"]) and $_POST["trangthai"] != "") $sql .= " and trangthai = $_POST[trangthai]";	
				 if(isset($_POST["lonhon_amt"]) and $_POST["lonhon_amt"] != "") $sql .= " and sodu >= $_POST[lonhon_amt]";
				 
				 if(isset($_POST["behon_amt"]) and $_POST["behon_amt"] != "") $sql .= " and sodu <= $_POST[behon_amt]";
				 
				 if(isset($_POST["behon_no_amt"]) and $_POST["behon_no_amt"] != "") $sql .= " and no <= $_POST[behon_no_amt]";
									echo "$sql";
				 $results = $control->query($sql);
				 while($taikhoan = $control->fetch_arr($results)){
					 
					 if ($taikhoan["trangthai"] == 2) $trangthai = "đang hoạt động" ;
					 else $trangthai = "tạm ngưng";
					 
					 echo "
                   <tr>
                    <td>&nbsp;$taikhoan[taikhoanid]</td>
                    <td>&nbsp;$trangthai</td>
                    <td>&nbsp;$taikhoan[ngaytao]</td>
                    <td>&nbsp;$taikhoan[sodu]</td>
                    <td>&nbsp;$taikhoan[no]</td>
                   
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?> 
   		   </table>
	</div> 