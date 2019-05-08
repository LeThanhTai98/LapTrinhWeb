
<?php session_start(); ?>
<?php require("DBconnect.php") ;?>
	
	<?php 
	    $sql = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]";
		
	
	?>		




<form id="form1" name="form1" method="get" action="acctrangchu.php" >
  
     	
           	  <table width="591" height="177"  align="center">
        	    <tr>
					<input type="hidden"  name="ts" value="dstk">
				  <td> <strong> TÌM KIẾM THEO ID</strong></td>
				   <td> <label><input type="input" name ="timkiem" onChange="form1.submit()" > </label></td>
				  </tr>
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="taikhoan" id="taikhoan" onchange="form1.submit()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql1 = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]"; ;
						
						$results_1 = $control->query($sql1);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>
							
							<option value='<?php echo $rowsacc["id_taikhoan"]; ?>' 
									<?php if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "" and $_GET["taikhoan"] == $rowsacc["id_taikhoan"]) echo "selected ='selected'";?>> <?php echo  $rowsacc["taikhoanid"];?></option>";
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
						
						
        	 			    <option value="1" <?php if( isset($_GET["trangthai"]) and $_GET["trangthai"] != "" and $_GET["trangthai"] == 1 ) echo "selected = 'selected'" ?> >
								tạm ngừng</option>
						
						
						    <option value="2" <?php if (isset($_GET["trangthai"]) and $_GET["trangthai"] != "" and $_GET["trangthai"] == 2 ) echo "selected = 'selected'" ?> > đang hoạt động</option>
						
						
      	            </select>
      	        </label></td>
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
				 $truyendulieu ="";
				 
				 
				 if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "") { 
					 $sql .=  " and id_taikhoan = $_GET[taikhoan]";
					 $truyendulieu .= "&taikhoan=$_GET[taikhoan]";
				 }
				 
				 if (isset($_GET["trangthai"]) and $_GET["trangthai"] != "") {
				
					 $sql .= " and trangthai = $_GET[trangthai]";
					  $truyendulieu .= "&trangthai=$_GET[trangthai]";
				 }
				 
				 
			
				  if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) { 
					 $sql .=  " and taikhoanid like '%$_GET[timkiem]%'";
					 $truyendulieu .= "&timkiem=$_GET[timkiem]";
				 }
				 
				 
				 
				 ?> 
				 
				 <?php 
	
	
	
  $kq = $control->query($sql);
  $tsp = mysqli_num_rows($kq);
  $sd = 5 ;
  $sn = 5 ;
  
  $tst = ceil($tsp/$sd);
  
  $tsn = ceil($tst/$sn);
  
  if (isset($_GET["gr"])){
	  $gr = $_GET["gr"];
	  $page = ($gr  - 1) * $sn + 1 ;
	  
	  }
  else if (isset($_GET["page"])){
	  $page = $_GET["page"] ;
	  $gr =  ceil ($page / $sn);
	  }
	  else {
		  $gr = $page = 1 ;}
		  
		  
	$vitri = ($page - 1) * $sd ;
	
			 
	$sql.= " limit $vitri , $sd ";
	$kq = $control->query($sql);
	
	$dem = $vitri+1 ;
  ?>  
  <?php
				 echo "$sql";
   while($taikhoan = $control->fetch_arr($kq)){
					 
					 if ($taikhoan["trangthai"] == 2) $trangthai = "đang hoạt động" ;
					 else $trangthai = "tạm ngưng";
					 
					if(isset($_GET["timkiem"]))$tais=highlightKeywords($taikhoan["taikhoanid"],$_GET["timkiem"]);
	                else $tais = $taikhoan["taikhoanid"];
	   
	   
					 echo "
                   <tr>
                    <td>&nbsp;$tais</td>
                    <td>&nbsp;$trangthai</td>
                    <td>&nbsp;$taikhoan[ngaytao]</td>
                    <td>&nbsp;$taikhoan[sodu]</td>
                    <td>&nbsp;$taikhoan[no]</td>
                   
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?>				 
				 
				 
   		   </table>
	
	
	<?php 
  if ($page != 1 and $page != 2) {
  $dau = $page-2 ;
   
  }
  else $dau = 1;
	$cuoi = $page + 2; 
  if ($cuoi > $tst) $cuoi = $tst ;
  
  
  ?>
  <p> trang : <?php  if ($page != 1 ){
	  ?>
      <a href="acctrangchu.php?ts=dstk&page=<?php echo 1 ; echo $truyendulieu;?>"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <b> <i> $i </i> </b> &nbsp;";
		 else {
			 ?>
	             
	       <a href="acctrangchu.php?ts=dstk&page=<?php echo $i ; echo $truyendulieu;?> "><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tsn ) {?> <a href="acctrangchu.php?ts=dstk&page=<?php echo $tst ;echo $truyendulieu; ?>"> >> </a>  <?php 
   }
  ?></p>
	
	