<?php 
 class class_coban {
	 private $khachhangid ;
		public function setid($id){
			$this->khachhangid = $id ;
		}
		public function getid (){
			return $this->khachhangid."<br>" ;
		}
		

	 
 }
?>

<?php 
	class chuyentien {
		private $khachhangid ;
		public function setid($id){
			$this->khachhangid = $id ;
		}
		public function getid (){
			return $this->khachhangid."<br>" ;
		}
		function chuyentien($id){
			$this->khachhangid = $id ;
		}
		public function chuyen ($id_nguoinhan,$tienchuyen,$con){
			$khach = $this->khachhangid ;
			$sql1 ="UPDATE taikhoan SET sodu = sodu + $tienchuyen WHERE khachhangid = $id_nguoinhan";
			$sql2 ="UPDATE taikhoan SET sodu = sodu - $tienchuyen WHERE khachhangid = $khach";
			if (!mysqli_query($con,$sql1))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
			if (!mysqli_query($con,$sql2))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
			if(mysqli_affected_rows($con) == 1)
				  {
					$successresult = "Transaction successfull";	
				    header("Location: formchuyentien3.php");
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
			return $successresult;
		}
	}
	?>
<?php 
 class guimail {
	 private $khachhangid ;
		public function setid($id){
			$this->khachhangid = $id ;
		}
		public function getid (){
			return $this->khachhangid."<br>" ;
		}
		function guimail($id){
			$this->khachhangid = $id ;
		}
	  public function gui ($con,$maXN){
		  $khach = $this->khachhangid ;
		  $res = mysqli_query($con,"SELECT * FROM khachhang where khachhangid=$khach");
          $arrpayment = mysqli_fetch_assoc($res);
		  $to = $arrpayment["email"];
          $subject = "mã xác nhận email";
          $txt = $maXN;
          $headers = "From: STB@mail.com" ;

mail($to,$subject,$txt,$headers);
	  }
 }
?>
<?php 
function taocode($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<?php 
 class vaytien  {
       private $khachhangid ;
		public function setid($id){
			$this->khachhangid = $id ;
		}
		public function getid (){
			return $this->khachhangid."<br>" ;
		}
		function vaytien($id){
			$this->khachhangid = $id ;
		}
	  public function vay ($con,$tienvay,$kieuvay){
		  
		  $date = date("Y-m-d");
		  $khach = $this->khachhangid ;
		  $results_4 = mysqli_query($con,"SELECT * FROM kieuvay where id_kieuvay=$kieuvay");
	      $array_4 = mysqli_fetch_assoc($results_4);
		  $b = $array_4["id_kieuvay"];
		  $c = $array_4["laixuat"];
		  $sql1 ="UPDATE taikhoan SET sodu = sodu + $tienvay WHERE khachhangid = $khach";
          $sql2 ="INSERT INTO vaytien VALUES('',$b,$tienvay,'hangthang',$c,$date,$khach)";
          if (!mysqli_query($con,$sql1))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
			if (!mysqli_query($con,$sql2))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
			if(mysqli_affected_rows($con) == 1)
				  {
					$successresult = "Transaction successfull";	
				    header("Location: formchuyentien3.php");
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
			return $successresult;
	  }
 }
?>