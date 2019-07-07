$(function(){
    // เมื่อเปลี่ยนค่าของ select id เท่ากับ list1
     $("select#list1").change(function(){
         // ส่งค่า ตัวแปร list1 มีค่าเท่ากับค่าที่เลือก ส่งแบบ get ไปที่ไฟล์ data_for_list2.php
         $.get("data_for_list2.php",{
             list1:$(this).val()
         },function(data){ // คืนค่ากลับมา
                $("select#list2").html(data);  // นำค่าที่ได้ไปใส่ใน select id เท่ากับ list2
                $("select#list2").trigger("change"); // อัพเดท list2 เพื่อให้ list2 ทำงานสำหรับรีเซ็ตค่า
         });
    });

    $("select#list2").change(function(){
        $.get("listNotification.php",{
            list2:$(this).val()
        },function(data){ // คืนค่ากลับมา
               $("#listNoti").html(data);
               $("#listNoti").trigger("change");

        });
    });


  $("select#list3").change(function(){
      $.get("listEquipment.php",{
        list3:$(this).val()
      },function(data){
             $("#listEQ").html(data);
             $("#listEQ").trigger("change");

      });
  });


});
