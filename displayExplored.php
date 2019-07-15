<html>
<head>
  <title>ตารางแสดงผลการตรวจสอบความต้องการ</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="MyStyle.css">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="exploration.php">EXP</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="displayExplored.php">ตารางแสดงผลการแจ้งเตือน</a></li>
    </ul>
    </div>
  </nav>
  <div class="container" style="margin-top:75px">
      <h1 align="center"> ตารางแสดงผลการสำรวจ </h1><br>

      <?php include ("behindDisplay.php");?>
  </div>

</body>

</html>
