<?php

include("DBconnect.php");
$loanarray = mysqli_query($conn,"select * from vaytien where khachhangid='11'");
?>		
<div align="center"> 
<table width="901" border="1">
      <tr>
        <th width="105" scope="col">VAY ID</th>
        <th width="93" scope="col">LOAI VAY</th>
        <th width="101" scope="col">SỐ LƯỢNG</th>
        <th width="144" scope="col">CHU KÌ</th>
        <th width="188" scope="col">LÃI</th>
        <th width="132" scope="col"><p>NGÀY BẮT ĐẦU</p></th>
      </tr>
	 <?php
 while($loan = $control->fetch_arr($loanarray))
	  {
echo "
      <tr>
        <td>&nbsp;$loan[vayid]</td>
        <td>&nbsp;$loan[kieuvay]</td>
        <td>&nbsp;$loan[sovay]</td>
        <td>&nbsp;$loan[chuky]</td>
        <td>&nbsp;$loan[laixuat]</td>
        <td>&nbsp;$loan[ngaytao]</td>
        
      </tr>";
	  }
	  ?>
    </table>

</div>