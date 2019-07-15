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

        <div class="row" id = "building">
          <label for="category">หมวดหมู่: อาคารและสิ่งก่อสร้าง</label><br>
          <?php
            $strSQL = "SELECT * FROM liste_building WHERE 1";
            $objQuery = mysql_query($strSQL);
            while($row = mysql_fetch_assoc($objQuery)){
              echo "<div class='col-25' id='mini-box'>";
              echo "<input type='checkbox' name='list_building[]' value ='".$row['E_Name_TH']."'>";
              echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name_TH']."</label>";
              echo "</div>";
            }
          ?>
          <textarea id="subject" name="additional_building" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div><br>

        <div class="row" id = "electric">
          <label for="category">หมวดหมู่: ระบบไฟฟ้า</label><br>
          <?php
            $strSQL = "SELECT * FROM liste_electric WHERE 1";
            $objQuery = mysql_query($strSQL);
            while($row = mysql_fetch_assoc($objQuery)){
              echo "<div class='col-25' id='mini-box'>";
              echo "<input type='checkbox' name='list_electric[]' value ='".$row['E_Name_TH']."'>";
              echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name_TH']."</label>";
              echo "</div>";
            }
          ?>
          <textarea id="subject" name="additional_electric" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div><br>

        <div class="row" id = "inside">
          <label for="category">หมวดหมู่: ครุภัณฑ์ภายในห้องเรียน</label><br>
            <?php
            $strSQL = "SELECT * FROM liste_inside WHERE 1";
            $objQuery = mysql_query($strSQL);
            while($row = mysql_fetch_assoc($objQuery)){
              echo "<div class='col-25' id='mini-box'>";
              echo "<input type='checkbox' name='list_inside[]' value ='".$row['E_Name_TH']."'>";
              echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name_TH']."</label>";
              echo "</div>";
            }
          ?>
          <textarea id="subject" name="additional_inside" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div><br>

        <div class="row" id = "outside">
          <label for="category">หมวดหมู่: ครุภัณฑ์ภายนอกห้องเรียน</label><br>
          <?php
            $strSQL = "SELECT * FROM liste_outside WHERE 1";
            $objQuery = mysql_query($strSQL);
            while($row = mysql_fetch_assoc($objQuery)){
              echo "<div class='col-25' id='mini-box'>";
              echo "<input type='checkbox' name='list_outside[]' value ='".$row['E_Name_TH']."'>";
              echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name_TH']."</label>";
              echo "</div>";
            }
          ?>
          <textarea id="subject" name="additional_outside" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div><br>

        <div class="row" id = "computer">
          <label for="category">หมวดหมู่: คอมพิวเตอร์</label><br>
          <?php
            $strSQL = "SELECT * FROM liste_computer WHERE 1";
            $objQuery = mysql_query($strSQL);
            while($row = mysql_fetch_assoc($objQuery)){
              echo "<div class='col-25' id='mini-box'>";
              echo "<input type='checkbox' name='list_computer[]' value ='".$row['E_Name_TH']."'>";
              echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name_TH']."</label>";
              echo "</div>";
            }
          ?>
          <textarea id="subject" name="additional_computer" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div><br>

        <div class="row" id = "media">
          <label for="category">หมวดหมู่: สื่อการสอน</label><br>
          <?php
            $strSQL = "SELECT * FROM liste_media WHERE 1";
            $objQuery = mysql_query($strSQL);
            while($row = mysql_fetch_assoc($objQuery)){
              echo "<div class='col-25' id='mini-box'>";
              echo "<input type='checkbox' name='list_media[]' value ='".$row['E_Name_TH']."'>";
              echo "<label for='box-1'><div><i class='fa fa-check'></i></div>".$row['E_Name_TH']."</label>";
              echo "</div>";
            }
          ?>
          <textarea id="subject" name="additional_media" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div><br>

        <div class="row" id = "other_c">
          <label for="category">หมวดหมู่: เพิ่มเติม</label><br>
          <textarea id="subject" name="additional_other" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
        </div><br>

        <div class="row" id="submitButton">
          <input type="submit" value="Submit">
        </div>
      </form>
  </div>
</body>
