<?php
 //Test รับค่าจาก main.php
  date_default_timezone_set("Asia/Bangkok");
  echo "ผู้แจ้ง: ".$_POST["username"]."<br>";
  echo "รหัสเขต: ".$_POST["list1"]."<br>";
  echo "รหัสโรงเรียน: ".$_POST["list2"]."<br>";
  echo "หมวดหมู่: ".$_POST["list3"]."<br>";
  echo "ประเภท: ".$_POST["list4"]."<br>";
  echo "วันที่: ".date("Y-m-d")."เวลา".date("H:i:s")."<br>";
  if(is_array($_POST["list_EQ"])){
    foreach ($_POST["list_EQ"] as $value) {
      echo "$value <br>";
    }
  }else{
    echo "It's not array!";
  }


?>
