<html>
<head>
  <title>การประเมิณระดับความสำคัญ</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="MyStyle.css">
  <script src="myScript.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="exploration.php">EXP</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="displayExplored.php">ตารางแสดงผลการแจ้งเตือน</a></li>
        <li><a href="../Noti/Notify.php">Notify.php</a></li>
        <li><a href="../Noti/displayInfo.php">displayInfo.php</a></li>
    </ul>
    </div>
  </nav>

  <div class="container" style="margin-top:100px">
      <h1 align="center">แบบสำรวจ</h1>
      <h3 align="center">
        ความต้องการครุภัณฑ์ สิ่งก่อสร้าง และสภาพสิ่งแวดล้อมของโรงเรียนภายใต้สังกัด<br>
        สำนักงานเขตพื้นที่การศึกษาประถมศึกษา ฉะเชิงเทราเขต 2
      </h3>

      <form action="save_eval.php" method="POST">
        <div class="row" id="evaluation">
          <?php
            include "config.php";
            session_start();
            $strQuery = "SELECT * FROM exploration WHERE logID_M = ".'"'.$_SESSION["logID_M_explore"].'"'." AND status != 1";
            //echo $strQuery."<br>";
            $objQuery = mysql_query($strQuery)or die(mysql_error());

            if (mysql_num_rows($objQuery)>0){
              echo "<label for="."'notification'".">ผลการสำรวจ</label><br>";
              echo "<table id='log_table'> <thead> <tr><th rowspan = '2'>No.</th> <th rowspan = '2'>วันที่</th> <th rowspan = '2'>เวลา</th>
              <th rowspan = '2'>ผู้แจ้ง</th> <th rowspan = '2'>หมวดหมู่</th> <th rowspan = '2'>ข้อความ</th> <th colspan='3'>ระดับความช่วยเหลือ</th></tr>
              <tr><th>ปกติ</th> <th>ด่วน</th> <th>เร่งด่วน</th></tr></thead>";
              echo "<tbody><tr><td>";
              $count = 0;
              $listMessage = array();
              while($row=mysql_fetch_array($objQuery)){
                  echo "<tr><td>".$row["logID"]."</td><td>";
                  echo $row["logDate"]. "</td><td>";
                  echo $row["logTime"]. "</td><td>";
                  echo $row["explorer"]. "</td><td>";
                  echo $row["category"]. "</td><td>";
                  echo $row['list']. "</td><td>";
                  array_push($listMessage,$row['list']);
                  echo "<input type='radio' name=".'"'."levelHelps[".$count."]".'"'." value=".'"'."normal".'"'." checked></td><td>";
                  echo "<input type='radio' name=".'"'."levelHelps[".$count."]".'"'." value=".'"'."fast".'"'." ></td><td>";
                  echo "<input type='radio' name=".'"'."levelHelps[".$count."]".'"'." value=".'"'."veryfast".'"'." ></td>";
                  echo "</td></tr>";
                  $count++;
                  $_SESSION["logID_M_explore"] = $row["logID_M"];
              }
              $_SESSION["listMessage"]= $listMessage;

            echo "</tbody></table>";
          }else{
            echo "<label for='noti'>ไม่มีการแจ้งเตือนจากทางโรงเรียน</label>";
          }
          ?>
        </div>
        <div class="row" id="submitButton">
          <input type="submit" value="Submit">
        </div>
      </form>
  </div>
</body>
