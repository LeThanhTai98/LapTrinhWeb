
<?php 
require ("DBconnect.php");
	require("doituong.php");
	    
		$results = mysqli_query($conn,"SELECT * FROM taikhoan where taikhoanid='11'");
	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		$ngaytao = $arrow["ngaytao"];
		$sodu = $arrow["sodu"];
		$khachhangid = $arrow["khachhangid"];
		$trangthai = $arrow["trangthai"];
	}
		
	if (isset($_POST["pay"])){
		$a = new themtaikhoanhuong('11');
		$a->them($conn,$_POST["id_them"]);
	}
?>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>THÊM TÀI KHOẢN HƯỞNG </h2>
           	  <table width="591" height="177" border="1">
        	    
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
