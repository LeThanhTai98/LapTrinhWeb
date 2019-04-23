
<?php 
require ("DBconnect.php");
	
	$passerr="";
		
	if (isset($_POST["pay"])){
		$passerr="";
		$sql= "select * from taikhoan where taikhoanid = $_POST[id_them]";
		$c =$control->query($sql);
		$h = $control->fetch_arr($c);
		
		
		$sql1 = "select taikhoanhuongid from taikhoanhuong where taikhoanhuongid = $_POST[id_them]" ;
		$d = $control->query($sql1);
		$j = $control->fetch_arr($d);
		
		
		if($h and !$j){
		$a = new themtaikhoanhuong('11');
		$a->them($conn,$_POST["id_them"]);
	   
		 
		}
		
			
		if (!$h)$passerr .= "tài khoản thêm không tồn tại";
		if ($j) $passerr .= "tài khoản thêm đã có trong dữ liệu";
 		
	}
?>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>THÊM TÀI KHOẢN HƯỞNG </h2>
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
        	      <td><strong>TÀI KHOẢN CẦN THÊM </strong></td>
        	      <td><label>
        	        <input type="text" name="id_them" id="id_them" size="25" />
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
