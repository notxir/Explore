<?php
  session_start();
  if(isset($_GET['list4']) && $_GET['list4'] != ""){
    $objConnect = mysql_connect("localhost","root","15315388") or die("Error Connect to Database");
    $objDB = mysql_select_db($_SESSION["dbName"]);
    $strSQL="SELECT * FROM ".$_GET['list4']." WHERE 1";
    $objQuery=mysql_query($strSQL);

    echo "<label for="."'category'".">รายการสิ่งของ</label><br>";
    while($row=mysql_fetch_array($objQuery)){
      echo "<div class='col-25' id='mini-box'>";
      echo "<input type='checkbox' name='list_EQ[]' value ='".$row['E_Name']."'>";
      echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name']."</label>";
      echo "</div>";

    }
  }
?>
