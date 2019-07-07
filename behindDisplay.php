<?php
  $objConnect = mysql_connect("localhost","root","15315388") or die("Error Connect to Database");
  $objDB = mysql_select_db("equipment_list");
  $strSQL = "SELECT * FROM notification WHERE 1";
	$objQuery = mysql_query($strSQL);

  if ($objQuery) {
    echo "<table id='log_table'> <thead class='thead-light'>
    <tr><th>No.</th> <th>วันที่</th> <th>เวลา</th> <th>ผู้แจ้ง</th> <th>เขต</th> <th>โรงเรียน</th> <th>หมวดหมู่</th> <th>ประเภท</th> <th>รายการ</th></tr>
    </thead>";
    echo "<tbody><tr><td>";
    while($row = mysql_fetch_assoc($objQuery)){
      echo "<tr><td>".$row["NID"]."</td><td>";
      echo $row["logDate"]. "</td><td>";
      echo $row["logTime"]. "</td><td>";
      echo $row["Username"]. "</td><td>";
      echo $row["AreaID"]. "</td><td>";
      echo $row["SchoolID"]. "</td><td>";
      echo $row["Category"]. "</td><td>";
      echo $row["Type"]. "</td><td>";

      $eachDetail = explode("/", $row['Detail']);
      $no =1;
      foreach ($eachDetail as $detail){
        echo $no.". ".$detail. "<br>";
        $no++;
      }
      echo "</td></td></tr>";
    }
  }else
      echo "0 results";

  echo "</tbody></table>";
?>
