<?php
  include "config.php";
  session_start();
  date_default_timezone_set("Asia/Bangkok");
  $logID_M = str_replace("-","",date("Y-m-d"))."-".$_POST["list2"];

  for ($i=0;$i<sizeof($_POST["levelHelps"]);$i++){
    if(is_array($_POST["levelHelps"])){
      //echo $_SESSION["listCategory"][$i]. $_SESSION["listMessage"][$i] . " --level-- ".$_POST["levelHelps"][$i]."<br>";
      $strSQL = "INSERT INTO exploration (logID_M, logDate, logTime, schoolArea, SchoolID, explorer, category, list, level) VALUES ('".$logID_M."', '".date("Y-m-d")."',
    		'".date("H:i:s")."','".$_POST["list1"]."','".$_POST["list2"]."','".$_POST["username"]."','".$_SESSION["listCategory"][$i]."','".$_SESSION["listMessage"][$i]."',
        '".$_POST["levelHelps"][$i]."')";
    	$objQuery = mysql_query($strSQL)or die(mysql_error());
    }
  }

  

  echo '<script language="javascript">'.'alert("แจ้งเตือนสำเร็จ!")'.'</script>';
  header("Refresh:0.1; url=exploration.php");
  mysql_close();
  session_destroy();
  exit();
?>
