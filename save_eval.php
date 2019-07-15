<?php
  include "config.php";
  session_start();
  date_default_timezone_set("Asia/Bangkok");

  //for the notification list.
  for ($i=0;$i<sizeof($_POST["levelHelps"]);$i++){
    if(is_array($_POST["levelHelps"])){
      $alterQuery = "UPDATE exploration SET status= 1, level = ".'"'.$_POST["levelHelps"][$i].'"'." WHERE logID_M = ".'"'.$_SESSION["logID_M_explore"].'"'.
        " AND list = ".'"'. $_SESSION["listMessage"][$i] . '"';
    	$objQuery = mysql_query($alterQuery)or die(mysql_error());

      echo $alterQuery."<br>";
    }
  }
  echo '<script language="javascript">'.'alert("เสร็จสิ้นการประเมิณ!")'.'</script>';
  //header("Refresh:0.1; url=exploration.php");
  mysql_close();
  session_destroy();
  //exit();
?>
