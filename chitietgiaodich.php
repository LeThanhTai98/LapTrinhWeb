<?php session_start(); ?>
	
<?php require("DBconnect.php") ;?>
	

<?php 
        
        
        $sql = "SELECT * FROM taikhoan where id_taikhoan = $_SESSION[taikhoanid] ";
		$results = $control->query($sql);
        $arr = $control->fetch_arr($results);
        
	    $sql = "SELECT * FROM chuyentien where (id_chuyen = '$arr[taikhoanid]' or id_nhan = '$arr[taikhoanid]')";
				  
				  
		$kq = $control->query($sql);
	
	?>		


<form id="form1" name="form1" method="get" action="acctrangchu.php" >
  
     	
           	  <table width="591" height="177"  align="center">
				  <input type="hidden" name="ts" value="ctgd" > 
        	    <tr>
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
							
							<option value='<?php echo $rowsacc["taikhoanid"]; ?>' 
									<?php if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "" and $_GET["taikhoan"] == $rowsacc["taikhoanid"]) echo "selected ='selected'";?>> <?php echo  $rowsacc["taikhoanid"];?></option>";
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>

				  <?php
				 $truyendulieu ="";
				 
				 
				 if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "") { 
					 $sql = "SELECT * FROM chuyentien where (id_chuyen = '$_GET[taikhoan]' or id_nhan = '$_GET[taikhoan]')";
					 $truyendulieu .= "&taikhoan=$_GET[taikhoan]";
				 }
				 
				 
			
				  if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) { 
					 $sql .=  " and chuyentienid like '%$_GET[timkiem]%'";
					 $truyendulieu .= "&timkiem=$_GET[timkiem]";
				 }
				 
				 
				 
				 ?> 
				 
				 <?php 
	
	
	
  $kq = $control->query($sql);
  $tsp = @mysqli_num_rows($kq);
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
				  
	
<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT GIAO DỊNH</h2>
     		 <table   border="1"  align="center">
     		   <tr >
				   <th width="105" scope="col" > ID CHUYỂN TIỀN</th>
     		     <th  width="105" scope="col">NGÀY THỰC HIỆN</th>      
                 <th width="105" scope="col">NGƯỜI CHUYỂN</th>
                 <th width="93" scope="col">NGƯỜI NHẬN</th>
                 <th width="101" scope="col">SỐ TIỀN</th>
                <div style=" width: 100%;max-width:120px;"> <th>NỘI DỤNG</th> </div>
                 
      </tr>			  
				  
				  
  <?php
				 echo "$sql";
   while($giaodich = $control->fetch_arr($kq)){
					 
					
					 
					if(isset($_GET["timkiem"]))$HL=highlightKeywords($giaodich["chuyentienid"],$_GET["timkiem"]);
	                else $HL=$giaodich["chuyentienid"];
	   
	   
					 echo "
                   
                   <tr>
				    <td>&nbsp;$HL</td>
                    <td>&nbsp;$giaodich[ngaytao]</td>
                    <td>&nbsp;$giaodich[id_chuyen]</td>
                    <td>&nbsp;$giaodich[id_nhan]</td>
                    <td>&nbsp;$giaodich[sotien]</td>
                    <td style='word-wrap: break-word;max-width:120px;'>&nbsp;$giaodich[noidung]</td>
                   
        
                  </tr>"; }
							 
				 
				 ?>				 
				 
   		   </table>
	</div> 
				  
	<?php 
  
  $dau = ($gr - 1)*$sn + 1 ;
  $cuoi = $gr*$sn ; 
  if ($cuoi > $tst) $cuoi = $tst ;
  
  
  ?>
  <p align="center"> trang : <?php  if ($gr > 1 ){
	  ?>
      <a href="acctrangchu.php?ts=ctgd&gr=<?php echo $gr - 1 ; echo $truyendulieu;?>"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <b> <i> $i </i> </b> &nbsp;";
		 else {
			 ?>
	             
	       <a href="acctrangchu.php?ts=ctgd&page=<?php echo $i ; echo $truyendulieu;?> "><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($gr < $tsn ) {?> <a href="acctrangchu.php?ts=ctgd&gr=<?php echo $gr + 1 ;echo $truyendulieu; ?>"> >> </a>  <?php 
   }
  ?></p>