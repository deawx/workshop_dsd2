<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>แบบ คร.10</title>
  <?=link_tag('assets/css/bootstrap.min.css');?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style media="screen">
  /* body {
    background: rgb(204,204,204);
  }
  page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
    box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  }
  page[size="A4"] {
    width: 21cm;
    height: 29.7cm;
  } */
  /* @media print {
    html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p,
    blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em,
    font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl,
    dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody,
    tfoot, thead, tr, th, td {
      font-size: 6pt !important;
      line-height: 50% !important;
    }
  } */
  </style>
</head>
<?php
$profile = $this->profile->get_id($record['user_id']);
$address = unserialize($profile['address']);
$address['province'] = dropdown_province()[$address['province']];
$address['amphur'] = dropdown_amphur()[$address['amphur']];
$address['tambon'] = dropdown_district()[$address['tambon']];

$address_current = unserialize($profile['address_current']);
$address_current['province'] = dropdown_province()[$address_current['province']];
$address_current['amphur'] = dropdown_amphur()[$address_current['amphur']];
$address_current['tambon'] = dropdown_district()[$address_current['tambon']];

$education = unserialize($profile['education']);
$work = unserialize($profile['work']);
// echo '<pre>';
// print_r($profile);
// print_r($address);
// print_r($education);
// print_r($work);
// print_r($record);
// echo '</pre>';
$reference = unserialize($record['reference']);
?>
<body class="" style="padding:1em;background:none;">
  <div class="" style="
      font-size: 6pt !important;
      line-height: 75% !important;
    ">
    <div class="container" style="">
      <div class="row hidden-print">
        <button type="button" class="btn btn-default" onclick="window.close()">ปิดหน้านี้</button>
        <button type="button" class="btn btn-default" onclick="window.print()">สั่งพิมพ์หน้านี้</button>
        <hr>
      </div>
      <div class="row">
        <div class="col-xs-12"> <p class="text-right">แบบ คร.10</p> </div>
        <div class="col-xs-12 text-center">
          <img src="<?=base_url('assets/images/krut.jpg');?>" style="width:113px;height:113px;">
          <div class="thumbnail" style="position: absolute; top: 0px; right: 0px; height:96px;width:96px;">
            <div class="caption"> รูปถ่าย <br> 1 นิ้ว <br> </div>
          </div>
          <h3 style="font-size: 8pt !important;">คำขอหนังสือรับรองความรู้ความสามารถ</h3>
        </div>
        <div class="col-xs-12">
          <p class="col-xs-4 col-xs-offset-8">เขียนที่ ........................................</p>
          <p class="col-xs-4 col-xs-offset-8">วันที่ .....<?=date('d');?> เดือน .....<?=dropdown_month(date('m'));?> พ.ศ. .....<?=date('Y')+543;?></p>
          <p>1.ข้าพเจ้า ..........<?=isset($profile['title'])?$profile['title']:''.nbs().isset($profile['firstname'])?$profile['firstname']:'';?>..........
            นามสกุล ..........<?=isset($profile['lastname'])?$profile['lastname']:'';?>..........</p>
          <p>เกิดวันที่ ..........<?=date('d',strtotime($profile['birthdate']));?>
            เดือน ..........<?=dropdown_month(date('m',strtotime($profile['birthdate'])));?>
            พ.ศ. ..........<?=date('Y',strtotime($profile['birthdate']));?>
            อายุ ..........<?=age_calculate($profile['birthdate']);?> ปี
            สัญชาติ ..........<?=$profile['nationality'];?>
            หมู่โลหิต ..........<?=$profile['blood'];?> </p>
          <?php $profile['id_card'] = (strlen($profile['id_card'])===13) ? $profile['id_card'] : str_repeat(0,13) ;
          $split = str_split($profile['id_card'],1);
          foreach ($split as $key => $value) :
            $split[$key] = '<span style="border:1px solid black;padding:0.1em;">'.$value.'</span>';
          endforeach; ?>
          <p>เลขประจำตัวประชาชน <?=$split[0];?>  <?=$split[1].nbs().$split[2].nbs().$split[3].nbs().$split[4];?>  <?=$split[5].nbs().$split[6].nbs().$split[7].nbs().$split[8].nbs().$split[9];?>  <?=$split[10].nbs().$split[11];?>  <?=$split[12];?></p>
          <p>ที่อยู่ตามทะเบียนบ้าน เลขที่ ..........<?=isset($address['address'])?$address['address']:'';?>..........
            หมู่ ..........<?=isset($address['moo'])?$address['moo']:'';?>..........
            ซอย ..........<?=isset($address['soi'])?$address['soi']:'';?>..........
            ถนน ..........<?=isset($address['street'])?$address['street']:'';?>..........
          </p>
          <p>แขวง/ตำบล ..........<?=isset($address['tambon'])?$address['tambon']:'';?>..........
            เขต/อำเภอ ..........<?=isset($address['amphur'])?$address['amphur']:'';?>..........
          </p>
          <p>จังหวัด ..........<?=isset($address['province'])?$address['province']:'';?>..........
            รหัสไปรษณีย์ ..........<?=isset($address['zip'])?$address['zip']:'';?>..........</p>
          <p>โทรศัพท์ ..........<?=isset($profile['phone'])?$profile['phone']:'';?>..........
            โทรสาร ..........<?=isset($profile['fax'])?$profile['fax']:'';?>..........
            อีเมล์ ..........<?=isset($profile['email'])?$profile['email']:'';?>..........</p>

          <p>ที่อยู่ตามปัจจุบัน เลขที่ ..........<?=isset($address_current['address'])?$address_current['address']:'';?>..........
            หมู่ ..........<?=isset($address_current['moo'])?$address_current['moo']:'';?>..........
            ซอย ..........<?=isset($address_current['soi'])?$address_current['soi']:'';?>..........
            ถนน ..........<?=isset($address_current['street'])?$address_current['street']:'';?>..........
          </p>
          <p>แขวง/ตำบล ..........<?=$address_current['tambon'];?>..........
            เขต/อำเภอ ..........<?=$address_current['amphur'];?>..........</p>
          <p>จังหวัด ..........<?=$address_current['province'];?>..........
            รหัสไปรษณีย์ ..........<?=$address_current['zip'];?>..........</p>
          <p>โทรศัพท์ ..........<?=isset($profile['phone'])?$profile['phone']:'';?>..........
            โทรสาร ..........<?=isset($profile['fax'])?$profile['fax']:'';?>..........
            อีเมล์ ..........<?=isset($profile['email'])?$profile['email']:'';?>..........</p>

          <p>2.วุฒิการศึกษา ..........<?=$education['degree'];?>..........
            สาขา ..........<?=isset($education['branch'])?$education['branch']:'';?>..........
            สถานศึกษา ..........<?=$education['place'];?>..........</p>
          <p>3.อาชีพ ..........<?=isset($work['career'])?$work['career']:'';?>..........
            สถานที่ทำงาน ..........<?=isset($work['place'])?$work['place']:'';?>..........</p>
          <p>4.มีความประสงค์จะขอรับหนังสือรับรองความรู้ความสามารถ ในสาขาอาชีพ</p>
          <span class="col-xs-12">
            <p>(1) สาขา ..........<?=$record['career1'];?>..........</p>
            <p>(2) สาขา ..........<?=$record['career2'];?>..........</p>
            <p>(3) สาขา ..........<?=$record['career3'];?>..........</p>
            <p>(4) สาขา ..........<?=$record['career4'];?>..........</p>
            <p>(5) สาขา ..........<?=$record['career5'];?>..........</p>
          </span>
          <p>5.เอกสารหลักฐานประกอบการยื่นคำขอ</p>
          <span class="col-xs-12">
            <p> <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[picture]'),'picture',set_checkbox('reference[picture]','picture',isset($reference['picture'])));?>(1)รูปถ่ายหน้าตรง ขนาด 1 X 1.5 นิ้ว พื้นหลังสีขาว ซึ่งถ่ายมาแล้วไม่เกินหกเดือน จำนวน 2 รูป</label> </div> </p>
            <p> <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'copy',set_checkbox('reference[copy]','copy',isset($reference['copy'])));?>(2)สำเนาบัตรประจำตัวประชาชน</label> </div> </p>
            <p> <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[etc]'),'etc',set_checkbox('reference[etc]','etc',(isset($reference['etc'])&&$reference['etc']!='')));?>(3)เอกสารอื่นๆ (โปรดระบุ)</label> ..........<?=(isset($reference['etc'])&&$reference['etc']!='')?$reference['etc']:NULL;?>..........</div> </p>
            <p style="text-indent:1em;">*ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นและเอกสารหลักฐานที่แนบคำขอถูกต้องและเป็นความจริงทุกประการ</p>
          </span>
        </div>
        <div class="col-xs-6 col-xs-offset-6">
          <br> <br> <p>ลงชื่อ ........................................ ผู้ยื่นคำขอ</p>
          <p>( ............................................................ )</p>
        </div>
      </div>
    </div>
    <div class="clearfix"> </div> <hr>
    <div class="container">
      <div class="row">
        <table class="table table-bordered">
          <tr>
            <td style="width:50%;" class="text-center"> บัตรประจำตัวผู้เข้ารับการประเมิน <br>ศูนย์ประเมินความรู้ความสามารถ </td>
            <td rowspan="2" class="text-center"> <br> <br> <br> ให้ผู้สมัครเก็บบัตรนี้ไว้แสดงหลักฐานเมื่อเข้าประเมิน <br>ถ้าไม่มีบัตรไม่อนุญาตให้เข้าประเมิน </td>
          </tr>
          <tr>
            <td style="width:50%;">
              <div class="col-xs-4">
                <div class="text-center" style="width:96px; height:144px; border:1px solid gray;">
                  <br> รูปถ่ายขนาด <br> 1 x 1.5 นิ้ว <br> <br>
                </div>
                <br> ........................................
                <br> (ลายมือชื่อผู้สมัคร)
              </div>
              <div class="col-xs-8">
                ชื่อ ..................................................
                <br>สาขาอาชีพ ........................................
                <br>1.สาขา ........................................
                <br>วันที่ประเมิน ........................................
                <br>2.สาขา ........................................
                <br>วันที่ประเมิน ........................................
              </div>​
              <div class="col-xs-12">
                ผู้รับสมัคร ........................................
                <br>วันที่ .......... เดือน .......... พ.ศ. ..........
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="row hidden-print">
        <p>รายการไฟล์เอกสารแนบ</p>
        <ul>
          <?php if ($record['file_1']!='') { ?>
            <li><a href="<?=site_url('uploads/'.$record['file_1']);?>" target="_blank">เอกสารแนบ1</a></li>
          <?php } ?>
          <?php if ($record['file_2']!='') { ?>
            <li><a href="<?=site_url('uploads/'.$record['file_2']);?>" target="_blank">เอกสารแนบ2</a></li>
          <?php } ?>
          <?php if ($record['file_3']!='') { ?>
            <li><a href="<?=site_url('uploads/'.$record['file_3']);?>" target="_blank">เอกสารแนบ3</a></li>
          <?php } ?>
          <?php if ($record['file_4']!='') { ?>
            <li><a href="<?=site_url('uploads/'.$record['file_4']);?>" target="_blank">เอกสารแนบ4</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

  <?=script_tag('assets/js/jquery.min.js');?>
  <?=script_tag('assets/js/bootstrap.min.js');?>
</body>
</html>
