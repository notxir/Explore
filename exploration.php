<html>
<head>
  <title>ระบบสำรวจงานนิเทศน์</title>
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

      <form action="save_explored.php" method="POST">
        <div class="row"><!--Username-->
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" id="username" name="username" placeholder="ชื่อผู้ใช้..." required>
        </div>
        <div class="row"><!--Select..area/school...-->
          <div class="col-25">
            <label for="areaname">ชื่อเขต</label>
            <select name="list1" id="list1">
              <option value="">เลือกเขต</option>
              <?php
                include "config.php";
                $strSQL = "SELECT * FROM iteczone WHERE 1";
                $objQuery = mysql_query($strSQL);
                while($row = mysql_fetch_assoc($objQuery))
                  echo '<option value="'.$row["zone_id"].'">'."เขต".$row["zone_n"].'</option>';
              ?>
            </select>
          </div>
          <div class="col-75">
            <label for="schoolname">ชื่อโรงเรียน</label>
            <select name="list2" id="list2">
              <option value="">เลือกโรงเรียน</option>
            </select>
          </div>
        </div>

        <div class="row" id ="listNoti"><!--Display notification -->
        </div>

        <div class="row"><!--Select a category...-->
            <label for="category">หมวดหมู่</label>
            <select name="list3" id="list3">
              <option value="">เลือกหมวด</option>
              <option value="liste_building">อาคารและสิ่งก่อสร้าง</option>
              <option value="liste_inside">ครุภัณฑ์ในห้องเรียน</option>
              <option value="liste_outside">ครุภัณฑ์นอกห้องเรียน</option>
              <option value="liste_electric">ระบบไฟฟ้า</option>
              <option value="liste_computer">คอมพิวเตอร์</option>
              <option value="liste_media">สื่อการสอน</option>
            </select>
        </div>

        <div class="row" id = "listEQ"><!--list of equipment...-->
        </div>

        <div class="row" id = "Addition"><!--list of addition...-->
          <label for="category">เพิ่มเติม</label>
          <textarea id="subject" name="additional" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div>
        <div class="row" id="submitButton">
          <input type="submit" value="Submit">
        </div>
      </form>
  </div>
</body>
