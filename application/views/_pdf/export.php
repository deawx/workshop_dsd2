<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ส่งออกข้อมูลคำร้อง</title>
  <?=link_tag('assets/css/bootstrap.min.css');?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div style="padding:0.5cm 1.5cm;">
    <div class="container" style="padding:1cm;">
      <div class="row hidden-print">
        <button type="button" class="btn btn-default" onclick="window.close()">ปิดหน้านี้</button>
        <button type="button" class="btn btn-default" onclick="window.print()">สั่งพิมพ์หน้านี้</button>
        <hr>
      </div>
      <div class="row">
        <h4>ตารางข้อมูลการยื่นคำร้อง</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">ประเภทการสอบ</th>
              <th class="text-center">ชื่อผู้เข้าสอบ</th>
              <th class="text-center">วันที่ยื่นคำร้อง</th>
              <th class="text-center">วันที่แก้ไข</th>
              <th class="text-center">วันที่หมดอายุ</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($requests as $key => $value) :
              $expired = strtotime('+30 days',strtotime($value['date_create']));
              $type = (isset($value['category'])?$value['category']:'สอบรับรองความรู้ความสามารถ');
              $profile = $this->profile->get_id($value['user_id']);
              ?>
              <tr>
                <td class="text-center"><?=++$key;?></td>
                <td><?=$type;?></td>
                <td><?=$profile['title'].nbs(2).$profile['firstname'].nbs(2).$profile['lastname'];?></td>
                <td class="text-center"><?=date('d-m-Y',strtotime($value['date_create']));?></td>
                <td class="text-center"><?=($value['date_update']!=NULL)?date('d-m-Y',strtotime($value['date_update'])):'N/A';?></td>
                <td class="text-center"><?=date('d-m-Y',strtotime($expired));?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?=script_tag('assets/js/jquery.min.js');?>
  <?=script_tag('assets/js/bootstrap.min.js');?>
</body>
</html>
