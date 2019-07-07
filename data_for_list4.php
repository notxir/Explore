<?php
  session_start();
  if(isset($_GET['list3'])){
    $objConnect = mysql_connect("localhost","root","15315388") or die("Error Connect to Database");
    $objDB = mysql_select_db($_GET['list3']);
    echo "<option value=''>เลือกประเภท</option>";
    $strSQL="SELECT * FROM category WHERE 1";
    $objQuery=mysql_query($strSQL);
    while($row=mysql_fetch_array($objQuery)){
      echo "<option value=".'"'.$row['C_Name-EN'].'"'.'>'.$row['C_Name-TH']."</option>";
    }
    $_SESSION["dbName"] = $_GET['list3'];

  }else{
    echo "<option value=''>เลือกประเภท</option>";
  }
?>
