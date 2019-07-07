<?php
  if(isset($_GET['list1']) && $_GET['list1']!=""){
    include "config.php";
    echo "<option value=''>เลือกโรงเรียน</option>";
    $strSQL="SELECT * FROM school WHERE zone_id='".$_GET['list1']."'";
    $objQuery=mysql_query($strSQL);
    while($row=mysql_fetch_array($objQuery)){
      echo "<option value=".'"'.$row['sc_id'].'"'.'>'."โรงเรียน".$row['sc_name']."</option>";
    }
  }else{
    echo "<option value=''>เลือกโรงเรียน</option>";
  }
?>
