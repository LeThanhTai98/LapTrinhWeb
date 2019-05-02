<?php

session_start();
?>
	
<?php 
require ("DBconnect.php");
	$passerr="";
	 $dem = 0 ;
   if(isset($_POST["taikhoan"])) $taikhoanid = $_POST["taikhoan"];
   else $taikhoanid = $_SESSION[taikhoanid]; 


   $sql = "SELECT * FROM taikhoantietkiem where taikhoanid=$taikhoanid" ;				
   $results_1 = $control->query($sql);			
   if($rowsacc = $control->fetch_arr($results_1))
	{
	$passerr="";
		$sql11 = "select * from taikhoantietkiem where taikhoanid = $taikhoanid" ;
		$q = $control->query($sql11);
		$p = $control->fetch_arr($q);
	    
	
	
	    $sql33 = "select * from kyhanguitien where id_kyhan = $p[kyhangui]" ;
        $m = $control->query($sql33);
	    $n = $control->fetch_arr($m);
	
	
	
	
	    $today = date("Y-m-d"); 
		$thatday = $p["ngaynhanlai"] ;
		if (strtotime($thatday) > strtotime($today)) 	$passerr.="<strong>CẢNH BÁO : chưa đến ngày nhận lãi , nếu rút tiền bây giờ sẽ không có lãi</strong> ";
	
	
	
	if (isset($_POST["pay"])){
		
		$kt = 0;
		$demthanhcong=0;
		$sql11 = "update taikhoan set sodu = sodu + $p[tiengui] where taikhoanid = $taikhoanid" ;
		$j = $control->query($sql11);
		$i = $control->row_affected();
		if ($i == 1) $demthanhcong++;
		
		
		
       if (strtotime($thatday) <= strtotime($today)){
		 $laixuat =  $p["tiengui"]*$n["laixuat"];     
		 $sql11 = "update taikhoan set sodu = sodu +$laixuat where taikhoanid = $taikhoanid " ;
		 $j = $control->query($sql11);
		 $i = $control->row_affected();
		 if ($i == 1) $demthanhcong++;
		 $kt = 1;
	   }
		
		
		
 		$sql11 = "delete from taikhoantietkiem where taikhoanid = $taikhoanid" ;
		$j = $control->query($sql11);
		$i = $control->row_affected();
		if ($i == 1) $demthanhcong++;
		if ($kt == 1 and $demthanhcong == 3 ) header("Location: formchuyentien3.php");
		if ($demthanhcong == 2 ) header("Location: formchuyentien3.php");
	}
   }
	 else $dem=1 ;
?>




 <form id="form2" name="form2" method="post" action="">
	  <table>
			<tr>
        	      <td><strong>CHỌN TÀI KHOẢN  </strong></td>
        	   <td><label>
        	       <select name="taikhoan" id="taikhoan"  onchange="form2.submit()" > 
					        <option value="11">tài khoản mặc định &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
				   <?php  
					    $sql = "SELECT * FROM taikhoan where khachhangid=$_SESSION[khachhangid] and trangthai = 2" ;				
                        $results_1 = $control->query($sql);			
                        
					  while ($rowsacc = $control->fetch_arr($results_1)){
						  if (isset($_POST["id_tietkiem"])) echo $_POST["taikhoan"] ;
					     ?>
				   <option value="<?php echo $rowsacc["taikhoanid"];?>" <?php 
						  
						  if (isset($_POST["taikhoan"]) and $_POST["taikhoan"] == $rowsacc['taikhoanid']) echo "selected ='selected'" ;?> > 
					   
					   <?php echo $rowsacc["taikhoanid"] ?>
					   
					   </option>
					   
					   
					 <?php }  ?>
				   </select>
				   
				   
      	           
      	        </label></td>
      	      </tr>  
			  
			  </table>
	</form>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>TÀI KHOẢN TIẾT KIỆM </h2>
	  <?php if ($dem != 1) { ?>    
           	  <table width="591" height="177" border="1">
        	      <?php
				if($passerr != "")
				{
					?>
                <tr>
                  <td colspan="2">&nbsp;<?php echo $passerr; ?></td>
                </tr>
                <?php
				}
				?>
        	    <tr>
        	      <td><strong>TÀI KHOẢN NGUỒN </strong></td>
        	   <td><label>
        	       
				     <?php  echo $p["taikhoanid"] ; ?>
				   
      	           
      	        </label></td>
      	      </tr>
				  <tr>
				  <td><strong> SỐ TIỀN GỬI</strong></td>
					  <td><label>
						 <?php echo $p["tiengui"]; ?>
						  </label>
					  </td>
				  </tr>
				    <tr>
				  <td><strong> NGÀY TẠO</strong></td>
					  <td><label>
						 <?php echo $p["ngaytao"]; ?>
						  </label>
					  </td>
				  </tr>
				    <tr>
				  <td><strong> NGÀY NHẬN LÃI</strong></td>
					  <td><label>
						 <?php echo $p["ngaynhanlai"]; ?>
						  </label>
					  </td>
				  </tr>
				   <tr>
				  <td><strong> LÃI XUẤT %</strong></td>
					  <td><label>
						 <?php
						  
						  
						  
						  echo $n["laixuat"]; ?>
						  </label>
					  </td>
				  </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
					  <input type="hidden" name="taikhoan" value=" <?php echo $taikhoanid ?>">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
<?php } else echo "không có tài khoản tiết kiệm chuyển hướng sang mở tài khoản tiết kiệm" ; ?>
