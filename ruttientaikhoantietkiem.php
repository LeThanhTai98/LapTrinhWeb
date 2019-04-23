
	
<?php 
require ("DBconnect.php");
	$passerr="";
	 $dem = 0 ;
   $sql = "SELECT * FROM taikhoantietkiem where taikhoanid='11'" ;				
   $results_1 = $control->query($sql);			
   if($rowsacc = $control->fetch_arr($results_1))
	{
	$passerr="";
		$sql11 = "select * from taikhoantietkiem where taikhoanid = '11'" ;
		$q = $control->query($sql11);
		$p = $control->fetch_arr($q);
	    
	
	
	    $sql33 = "select * from kyhanguitien where id_kyhan = $p[kyhangui]" ;
        $m = $control->query($sql33);
	    $n = $control->fetch_arr($m);
	
	
	
	
	    $today = date("Y-m-d"); 
		$thatday = $p["ngaynhanlai"] ;
		if (strtotime($thatday) > strtotime($today)) 	$passerr.="<strong>CẢNH BÁO : chưa đến ngày nhận lãi , nếu rút tiền bây giờ sẽ không có lãi</strong> ";
	
	
	
	if (isset($_POST["pay"])){
		$demthanhcong=0;
		$sql11 = "update taikhoan set sodu = sodu + $p[tiengui] where taikhoanid = '11'" ;
		$j = $control->query($sql11);
		$i = $control->row_affected();
		if ($i == 1) $demthanhcong++;
		
		
		
       if (strtotime($thatday) <= strtotime($today)){
		 $laixuat =  $p["tiengui"]*$n["laixuat"];     
		 $sql11 = "update taikhoan set sodu = sodu +$laixuat where taikhoanid = '11' " ;
		 $j = $control->query($sql11);
		 $i = $control->row_affected();
		 if ($i == 1) $demthanhcong++;
		
	   }
		
		
		
 		$sql11 = "delete from taikhoantietkiem where taikhoanid = '11'" ;
		$j = $control->query($sql11);
		$i = $control->row_affected();
		if ($i == 1) $demthanhcong++;
		if ($demthanhcong == 2 or $demthanhcong ==3) header("Location: formchuyentien3.php");
	}
   }
	 else $dem=1 ;
?>

<?php if ($dem != 1) { ?>
<form id="form1" name="form1" method="post" action="">
  
     	<h2>TÀI KHOẢN TIẾT KIỆM </h2>
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
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
<?php } else echo "không có tài khoản tiết kiệm chuyển hướng sang mở tài khoản tiết kiệm" ; ?>
