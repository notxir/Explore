<?php
  session_start();
  if(isset($_GET['list2']) && $_GET['list2'] != ""){
    include "config.php";

    $count = 0;
    $strSQL="SELECT * FROM notification WHERE SchoolID = ".$_GET["list2"];
    $objQuery=mysql_query($strSQL);

    if (mysql_num_rows($objQuery)>0){
      echo "<label for="."'notification'".">ผลการแจ้งเตือน</label><br>";
      echo "<table id='log_table'> <thead> <tr><th rowspan = '2'>No.</th> <th rowspan = '2'>วันที่</th> <th rowspan = '2'>เวลา</th>
      <th rowspan = '2'>ผู้แจ้ง</th> <th rowspan = '2'>หมวดหมู่</th> <th rowspan = '2'>ข้อความ</th> <th colspan='3'>ระดับความช่วยเหลือ</th></tr>
      <tr><th>ปกติ</th> <th>ด่วน</th> <th>เร่งด่วน</th></tr></thead>";
      echo "<tbody><tr><td>";

      $listCategory = array();
      $listMessage = array();

      while($row=mysql_fetch_array($objQuery)){
        echo "<tr><td>".$row["logID"]."</td><td>";
        echo $row["logDate"]. "</td><td>";
        echo $row["logTime"]. "</td><td>";
        echo $row["Username"]. "</td><td>";
        echo $row["Category"]. "</td><td>";
        echo $row['Message']. "</td><td>";
        array_push($listCategory,$row['Category']);
        array_push($listMessage,$row['Message']);
        echo "<input type='radio' name=".'"'."levelHelps[".$count."]".'"'." value=".'"'."normal".'"'." checked></td><td>";
        echo "<input type='radio' name=".'"'."levelHelps[".$count."]".'"'." value=".'"'."fast".'"'." ></td><td>";
        echo "<input type='radio' name=".'"'."levelHelps[".$count."]".'"'." value=".'"'."veryfast".'"'." ></td>";
        echo "</td></tr>";
        $count++;
      }
      $_SESSION["listCategory"]= $listCategory;
      $_SESSION["listMessage"]= $listMessage;
    echo "</tbody></table>";
  }else{
    echo "<label for='noti'>ไม่มีการแจ้งเตือนจากทางโรงเรียน</label>";
  }
  }
?>
