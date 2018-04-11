<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>บัตรนัดกำหนดการสอบ</title>
  <?=link_tag('assets/css/bootstrap.min.css');?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php
$profile = unserialize($record['profile']);
$address = unserialize($record['address']);
$reference = unserialize($record['reference']);
$type = isset($value['category']) ? $value['category'] : 'หนังสือรับรองความรู้ความสามารถ';
?>
<body>
  <div style="padding:0.5cm 1.5cm;">
    <div class="container" style="padding:1cm;">
      <div class="row hidden-print">
        <button type="button" class="btn btn-default" onclick="window.close()">ปิดหน้านี้</button>
        <button type="button" class="btn btn-default" onclick="window.print()">สั่งพิมพ์หน้านี้</button>
        <hr>
      </div>
      <div class="row">
        <h2 class="text-center">บัตรนัดกำหนดการสอบ</h2>
        <br>
        <div class="pull-right">
          <p> วันที่เข้าสอบ ..........
            <?php if ($record['approve_schedule']!=NULL) :
              echo date('d',$record['approve_schedule']).' '.dropdown_month(date('m',$record['approve_schedule'])).' '.(date('Y',$record['approve_schedule'])+543);
            endif; ?>..........
          </p>
          <p>ช่วงเวลาสอบ ..........
            <?=(isset($record['approve_time'])&&$record['approve_time']!=NULL)?$record['approve_time']:'';?>..........
          </p>
        </div>
        <br>
        <p>ชื่อผู้สอบ ..........<?=$profile['title'].nbs(2).$profile['firstname'].nbs(2).$profile['lastname'];?>..........</p>
        <p>วันที่ยื่นคำร้อง ..........
          <?php if ($record['date_create']!=NULL) :
            echo date('d',$record['date_create']).' '.dropdown_month(date('m',$record['date_create'])).' '.(date('Y',$record['date_create'])+543);
          endif; ?>..........
        </p>
        <p>วันที่อนุมัติ ..........
          <?php if ($record['approve_date']!=NULL) :
            echo date('d',$record['approve_date']).' '.dropdown_month(date('m',$record['approve_date'])).' '.(date('Y',$record['approve_date'])+543);
          endif; ?>..........
        </p>
        <p>ประเภทการสอบ ..........<?=$type;?>..........</p>
        <br>
        <p>เอกสารที่ต้องนำมาด้วย มีดังนี้</p>
        <ul>
        <?php if (is_array($reference)) : ?>
          <?php foreach ($reference as $_r => $r) : ?>
            <?php if ($r!='') : ?>
              <li><?=$r;?></li>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif;?>
        </ul>
        <br>
        <p>ค่าใช้จ่ายที่จำเป็น มีดังนี้</p>
        <ul>
          <li>ค่าธรรมเนียมในการประเมิน <?=($type=='หนังสือรับรองความรู้ความสามารถ')?'100 บาทถ้วน':'1,000 บาทถ้วน'?></li>
        </ul>
        <p>หมายเหตุ</p>
        <ul>
          <li>สามารถรับใบผ่านการทดสอบมาตรฐานฝีมือแรงงานได้หลังจากสอบผ่านไปแล้ว 15 วัน</li>
        </ul>
      </div>
    </div>
    <?=script_tag('assets/js/jquery.min.js');?>
    <?=script_tag('assets/js/bootstrap.min.js');?>
  </body>
  </html>
