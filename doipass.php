<?php session_start(); ?>
<?php 
require ("DBconnect.php");
	    
		
		
	if (isset($_POST["pay"])){
		$passerr = "";
		$sql = "select * from khachhang  where id_khachhang =$_SESSION[id_khachhang]";
		$a = $control->query($sql);
		$b = $control->fetch_arr($a);
	 if($_POST["pass"] == $b["pass"] and $_POST["email"] == $_POST["code"] and $_POST["passmoi"]==$_POST["passlai"]){	
		 $sql = "UPDATE khachhang SET pass = $_POST[passmoi] where id_khachhang = $_SESSION[id_khachhang]";
		$a = $control->query($sql);
		if ($control->row_affected() == 1)header("Location: formchuyentien3.php");
		else echo "co gi sai";																						
																									
																									
		 }
	 else {
		 
		 $code = $_POST["code"];
		 if ($_POST["pass"] != $b["pass"]) $passerr+="mật khẩu cũ sai"."<br>";
		 if ($_POST["email"] != $_POST["code"]) $passerr+="mã xác nhận email sai"."<br>";
		 if ($_POST["passmoi"]!=$_POST["passlai"]) $passer+="nhập lại mật khẩu không trùng";
	 }	
	}
	else {
		$passerr = "";
		$code = taocode(4);
		$mail = new guimail("11");
	@$mail->gui($conn,$code);
		echo $code;
	}
?>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>ĐỔI MẬT KHẨU  </h2>
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
        	      <td><strong>MẬT KHẨU CŨ </strong></td>
        	      <td> <input type="password" name="pass" id="pass"></td>			
      	      </tr>
				  <tr>
        	      <td><strong>MẬT KHẨU MỚI </strong></td>
        	      <td> <input type="password" name="passmoi" id="passmoi"></td>
				  
				
      	      </tr>
				  <tr>
        	      <td><strong>NHẬP LẠI MẬT KHẨU MỚI </strong></td>
        	      <td> <input type="password" name="passlai" id="passlai"></td>		
      	      </tr>
				 </tr>
				  <tr>
        	      <td><strong>MÃ XÁC NHẬN EMAIL </strong></td>
        	      <td> <input type="text" name="email" id="email"></td>		
					  <input type="hidden" name="code" value="<?php echo $code; ?>"  />
      	      </tr>
				   
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>

