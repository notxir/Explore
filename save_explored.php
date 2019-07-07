<?php
  include "config.php";
  session_start();
  date_default_timezone_set("Asia/Bangkok");

  //get value of list and level of helps
  if(is_array($_POST["levelHelps"])){
    foreach ($_POST["levelHelps"] as $value) {
      echo $value."<br>";
    }
  }
  if(is_array($_SESSION["list"])){
    foreach ($_SESSION["list"] as $value) {
      echo $value."<br>";
    }
  }
  for ($i=0;$i<sizeof($_SESSION["list"]);$i++){

  }
/*
  $detail = "";
  $check = 1;
  if(is_array($_POST["list_EQ"])){
    foreach ($_POST["list_EQ"] as $value) {
      if ($check == 1){
        $detail = $value;
        $check++;
      }else
        $detail = $detail."/".$value;
    }
  }

  $strSQL = "INSERT INTO exploration (logDate, logTime, AreaID, SchoolID, explorer, category, list, level) VALUES ('".date("Y-m-d")."',
		'".date("H:i:s")."','".$_POST["list1"]."','".$_POST["list2"]."','".$_POST["username"]."','".$_POST["list3"]."','".$_POST["list4"]."',
    '".$detail."')";
	$objQuery = mysql_query($strSQL);
*/
  echo '<script language="javascript">'.'alert("แจ้งเตือนสำเร็จ!")'.'</script>';
  //header("Refresh:0.1; url=exploration.php");
  mysql_close();
  session_destroy();
  //exit();
?>
