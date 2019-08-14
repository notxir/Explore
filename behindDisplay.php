<?php
  include "config.php";
  $strSQL = "SELECT * FROM exploration WHERE 1";
	$objQuery = mysql_query($strSQL);

  if ($objQuery) {
    echo "<table id='log_table' border = '1'> <thead class='thead-light'>
    <tr><th>No.</th> <th>วันที่</th>  <th>ผู้แจ้ง</th>  <th>โรงเรียน</th> <th>หมวดหมู่</th> <th>รายการ</th>
    <th>ระดับความช่วยเหลือ</th> <th>สถานะ</th></tr>
    </thead>";
    echo "<tbody><tr><td>";
    while($row = mysql_fetch_assoc($objQuery)){
      echo "<tr><td>".$row["logID"]."</td><td>";
      echo $row["logDate"]. "</td><td>";
      //echo $row["logTime"]. "</td><td>";
      echo $row["explorer"]. "</td><td>";
/*
      $strSQL1 = "SELECT zone_n FROM iteczone WHERE zone_id ='".$row["schoolArea"]."'";
      $objQuery2 = mysql_query($strSQL1);
      $schoolArea = mysql_fetch_assoc($objQuery2);
      echo $schoolArea[zone_n]. "</td><td>";
*/
      $strSQL2 = "SELECT sc_name FROM school WHERE sc_id ='".$row["schoolID"]."'";
      $objQuery2 = mysql_query($strSQL2);
      $schoolName = mysql_fetch_assoc($objQuery2);
      echo $schoolName[sc_name]. "</td><td>";

      echo $row["category"]. "</td><td>";
      echo $row["list"]. "</td><td>";

      if ($row["level"] == "normal"){
        echo "ปกติ"."</td><td>";
      }else if ($row["level"] == "fast"){
        echo "ด่วน"."</td><td>";
      }else{
        echo "เร่งด่วน"."</td><td>";
      }

      if ($row["status"] == 1){
        echo "<font color=".'"'."#00e600".'"'.">ตรวจสอบแล้ว</font>" . "</td>";
      }else{
        echo "<font color=".'"'."FAA857".'"'.">รอการยืนยัน</font>" . "</td>";
      }
      echo "</td></td></tr>";
    }
  }else
      echo "0 results";

  echo "</tbody></table>";
?>
