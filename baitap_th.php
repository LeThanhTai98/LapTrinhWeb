<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	
<?php	$hostname = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = "baitap_th";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
if (!$conn) {
 die('Không thể kết nối: ' . mysqli_error($conn));
 exit();
}
 header("Content-type: text/html; charset=utf-8");
        mysqli_set_charset($conn, 'UTF8');
	?>
	
	
	<form name="form1" method="get">
	ca sĩ<select name="casi" onChange="form1.submit()">
		<option value=""> tất cả</option>
		<?php 
		  $sql = "select * from webnhac_casi";
		  $resu = mysqli_query($conn,$sql);
		  while ($kq = mysqli_fetch_assoc($resu))
		  {
			  ?>
			 
		<option value="<?php echo $kq["idCS"] ;?>" <?php if(isset($_GET["casi"]) and $_GET["casi"] == $kq["idCS"]) echo "selected='selected'"?>> <?php echo $kq["HoTenCS"]; ?></option>
			  
		<?php	  
		  }
		
		
		?>
		
		
		</select>
	
	nhạc sĩ<select name="nhacsi" onChange="form1.submit()">
		<option value=""> tất cả</option>
		<?php 
		  $sql = "select * from webnhac_nhacsi";
		  $resu = mysqli_query($conn,$sql);
		  while ($kq = mysqli_fetch_assoc($resu))
		  {
			  ?>
			 
		<option value="<?php echo $kq["idNS"] ;?>" <?php if(isset($_GET["nhacsi"]) and $_GET["nhacsi"] == $kq["idNS"]) echo "selected='selected'"?>> <?php echo $kq["HoTenNS"]; ?></option>
			  
		<?php	  
		  }
		
		
		?>
		
		
		</select>
		sắp xếp theo <select name="sapxep" onChange="form1.submit()">
		<option value =""></option>
		<option value="1" <?php if(isset($_GET["sapxep"]) and $_GET["sapxep"] == 1) echo "selected='selected'"?>> theo số lần nghe </option>
	    <option value="2" <?php if(isset($_GET["sapxep"]) and $_GET["sapxep"] == 2) echo "selected='selected'"?>> theo số lượt tải </option>
		
		</select>
	<table  border="1"  align="center">
     		   <tr >
     		     <th   scope="col">Tên bài hát</th>      
                 
                 <th  scope="col">số lần nghe</th>
                 <th  scope="col">số lượt tải</th>
                 <th  scope="col">tên nhạc sĩ</th>
				 <th  scope="col">tên ca sĩ</th>  
                 
      </tr>
				<?php
		         $dem = 0 ;
		         $sql = "select * from webnhac_baihat ";
		         
				 if (isset($_GET["casi"]) and $_GET["casi"] != "") 
					 if ($dem == 0){$sql .=  " where idCS = $_GET[casi]"; $dem=1 ;}
		                 else $sql .= " and idCS = $_GET[casi]";
				 
				 if (isset($_GET["nhacsi"]) and $_GET["nhacsi"] != "") 
					 if ($dem == 0){$sql .=  " where idNS = $_GET[nhacsi]"; $dem=1 ;}
		                 else $sql .= " and idNS = $_GET[nhacsi]";	
				
				
				if (isset($_GET["sapxep"]) and $_GET["sapxep"] != "")
					if($_GET["sapxep"] == 1){$sql .= " order by SoLanNghe desc";}
				        else $sql .= " order by SoLanDown desc";
					
									echo "$sql";
				 $resu = mysqli_query($conn,$sql);
				 while($kq =mysqli_fetch_assoc($resu)){
					 
					 
					 echo "
                   <tr>
                    <td>&nbsp;$kq[TenBH]</td>
                   
                    <td>&nbsp;$kq[SoLanNghe]</td>
                    <td>&nbsp;$kq[SoLanDown]</td>
                    <td>&nbsp;$kq[idNS]</td>
                    <td>&nbsp;$kq[idCS]</td>
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?> 
   		   </table>
		
		
	</form>
</body>
</html>