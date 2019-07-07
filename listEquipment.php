<?php
  session_start();
  if(isset($_GET['list3']) && $_GET['list3'] != ""){
    require "config.php";
    $strSQL="SELECT * FROM ".$_GET['list3']." WHERE 1";
    $objQuery=mysql_query($strSQL);

    echo "<label for="."'category'".">รายการสิ่งของ</label><br>";
    while($row=mysql_fetch_array($objQuery)){
      echo "<div class='col-25' id='mini-box'>";
      echo "<input type='checkbox' name='list_EQ[]' value ='".$row['E_Name_TH']."'>";
      echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name_TH']."</label>";
      echo "</div>";
    }
  }
?>
