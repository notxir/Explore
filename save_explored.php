<?php
  include "config.php";
  session_start();
  date_default_timezone_set("Asia/Bangkok");

  $logID_M_explore = str_replace("-","",date("Y-m-d"))."-".$_POST["list2"];
  $status = 1;

  //for the notification list.
  for ($i=0;$i<sizeof($_POST["levelHelps"]);$i++){
    if(is_array($_POST["levelHelps"])){
      //echo $_SESSION["listCategory"][$i]. $_SESSION["listMessage"][$i] . " --level-- ".$_POST["levelHelps"][$i]."<br>";
      $strSQL = "INSERT INTO exploration (logID_M, logDate, logTime, schoolArea, SchoolID, explorer, category, list, level, status) VALUES ('".$logID_M_explore."',
        '".date("Y-m-d")."','".date("H:i:s")."','".$_POST["list1"]."','".$_POST["list2"]."','".$_POST["username"]."','".$_SESSION["listCategory"][$i]."',
        '".$_SESSION["listMessage"][$i]."','".$_POST["levelHelps"][$i]."','".$status."')";
    	//$objQuery = mysql_query($strSQL)or die(mysql_error());

      //echo $alterQuery;
    }
  }
  $alterQuery = "UPDATE notification SET status= 1 WHERE logID_M = ".'"'.$_SESSION["logID_M_noti"].'"';
  $objQuery = mysql_query($alterQuery)or die(mysql_error());

  //for check box of each category.
  //  echo "Display part checkbox"."<br>";

  $list = array ($_POST['list_building'],$_POST['list_fixing'],$_POST['list_electric'],$_POST['list_inside'],
            $_POST['list_outside'],$_POST['list_computer'],$_POST['list_media']);
  $sublist_c = array("อาคารและสิ่งก่อสร้าง","ปรับปรุงซ่อมแซมอาคารเรียนและสิ่งก่อสร้าง","ไฟฟ้า","ครุภัณฑ์ภายในห้องเรียน","ครุภัณฑ์ภายนอกห้องเรียน","คอมพิวเตอร์","สื่อการสอน");
/*
  for ($i=0;$i<sizeof($list);$i++){
    if(isset($list[$i])){
      foreach ($list[$i] as $eachMessage){
        $strSQL = "INSERT INTO exploration (logID_M, logDate, logTime, schoolArea, SchoolID, explorer, category, list) VALUES ('".$logID_M_explore."',
          '".date("Y-m-d")."','".date("H:i:s")."','".$_POST["list1"]."','".$_POST["list2"]."','".$_POST["username"]."','".$sublist_c[$i]."','".$eachMessage."')";
        //echo $strSQL."<br>";
        $objQuery = mysql_query($strSQL)or die(mysql_error());
      }
    }
  }
*/

  for ($i=0;$i<sizeof($list);$i++){
    if(isset($list[$i])){
      foreach ($list[$i] as $eachMessage){
            //echo "Tag: ".$sublist_c[$i]." - Message ".$i.": ".$eachMessage." --- Detail: ".$_POST[$eachMessage]."<br>";
            $strSQL = "INSERT INTO exploration (logID_M, logDate, logTime, schoolArea, SchoolID, explorer, category, list, detail) VALUES ('".$logID_M_explore."',
                '".date("Y-m-d")."','".date("H:i:s")."','".$_POST["list1"]."','".$_POST["list2"]."','".$_POST["username"]."','".$sublist_c[$i]."',
                '".$eachMessage."','".$_POST[$eachMessage]."')";
            $objQuery = mysql_query($strSQL)or die(mysql_error());
          }
      }
    }

  if (isset($_POST['additional_other'])){
    $strSQL = "INSERT INTO exploration (logID_M, logDate, logTime, schoolArea, SchoolID, explorer, category, list) VALUES ('".$logID_M_explore."',
        '".date("Y-m-d")."','".date("H:i:s")."','".$_POST["list1"]."','".$_POST["list2"]."','".$_POST["username"]."','"."เพิ่มเติม"."',
        '".$_POST['additional_other']."')";
    $objQuery = mysql_query($strSQL)or die(mysql_error());
  }


/*
  //for textarea of each category.
  //echo "<br><br>Display part textarea"."<br><br>";
  $list2 = array($_POST["additional_building"],$_POST["additional_electric"],$_POST["additional_inside"],$_POST["additional_outside"],
    $_POST["additional_computer"],$_POST["additional_media"],$_POST["addtional_other"]);
  $sublist_c2 = array("อาคารและสิ่งก่อสร้าง","ไฟฟ้า","ครุภัณฑ์ภายในห้องเรียน","ครุภัณฑ์ภายนอกห้องเรียน","คอมพิวเตอร์","สื่อการสอน","อื่นๆ");

  for($i=0;$i<sizeof($list2);$i++){
    if (isset($list2[$i])){
      $subText = explode("\n",$list2[$i]);
      for ($j=0;$j<sizeof($subText);$j++){
        if ($subText[$j] != ""){
          $strSQL = "INSERT INTO exploration (logID_M, logDate, logTime, schoolArea, SchoolID, explorer, category, list) VALUES ('".$logID_M_explore."',
            '".date("Y-m-d")."', '".date("H:i:s")."','".$_POST["list1"]."','".$_POST["list2"]."','".$_POST["username"]."','".$sublist_c2[$i]."','".$subText[$j]."')";
          echo $strSQL."<br>";
          $objQuery = mysql_query($strSQL)or die(mysql_error());
        }
      }
    }
  }
  */
  $_SESSION["logID_M_explore"] = $logID_M_explore;

  echo '<script language="javascript">'.'alert("บันทึกข้อมูลสำเร็จ!")'.'</script>';
  header("Refresh:0.1; url=evaluation.php");
  mysql_close();
  exit();

?>
