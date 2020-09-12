<?php
// แบบ กพร.201
require_once FCPATH.'/vendor/autoload.php';

$profile = $this->profile->get_id($record['user_id']);
$address = unserialize($profile['address']);
$education = unserialize($profile['education']);
$work = unserialize($profile['work']);
$work_yes = unserialize($record['work_yes']);
$work_abroad = unserialize($record['work_abroad']);
$reference = unserialize($record['reference']);

try {
  $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
  $fontData = $defaultFontConfig['fontdata'];

  $mpdf = new \Mpdf\Mpdf(array(

    'mode' => 'UTF-8',
    'enableImports' => true,
    'default_font_size' => 12,
    'fontdata' => $fontData + [
      "sarabun" => [
        'R' => "TH-Sarabun-New-Regular.ttf",
        'B' => "TH-Sarabun-New-Bold.ttf",
        'I' => "TH-Sarabun-New-Italic.ttf",
        'BI' => "TH-Sarabun-New-BoldItalic.ttf",
        'useOTL' => 0x00,
        'useKashida' => 75,
      ]
    ],
    'default_font' => 'sarabun'
  ));
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$file = $mpdf->SetSourceFile(APPPATH.'/views/_pdf/standard.pdf');

$import_page = $mpdf->ImportPage(1);
$mpdf->UseTemplate($import_page);

// Profile & Education
$mpdf->WriteHTML('
  <div style="position: absolute; top: 55px; left:420px;">'.(isset($record['department'])?$record['department']:'').'&nbsp;</div>
  <div style="position: absolute; top: 72px; left:420px;">'.(isset($record['branch'])?$record['branch']:'').'&nbsp;</div>
  <div style="position: absolute; top: 90px; left:400px;">'.(isset($record['level'])?$record['level']:'').'&nbsp;</div>
  <div style="position: absolute; top: 140px; left:300px;">'.(isset($profile['firstname'])?$profile['firstname']:'').'&nbsp;</div>
  <div style="position: absolute; top: 140px; left:480px;">'.(isset($profile['lastname'])?$profile['lastname']:'').'&nbsp;</div>
  <div style="position: absolute; top: 145px; left:625px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 145px; left:680px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 158px; left:300px;">'.(isset($profile['englishname'])?$profile['englishname']:'').'&nbsp;</div>
  <div style="position: absolute; top: 158px; left:535px;">'.(isset($profile['nationality'])?$profile['nationality']:'').'&nbsp;</div>
  <div style="position: absolute; top: 158px; left:665px;">'.(isset($profile['religion'])?$profile['religion']:'').'&nbsp;</div>
  <div style="position: absolute; top: 175px; left:575px;">'.date('d',strtotime($profile['birthdate'])).'&nbsp;</div>
  <div style="position: absolute; top: 175px; left:605px;">'.date('m',strtotime($profile['birthdate'])).'&nbsp;</div>
  <div style="position: absolute; top: 175px; left:640px;">'.date('Y',strtotime($profile['birthdate'])).'&nbsp;</div>
  <div style="position: absolute; top: 175px; left:695px;">'.age_calculate($profile['birthdate']).'&nbsp;</div>
  <div style="position: absolute; top: 200px; left:355px;">'.(isset($address['address'])?$address['address']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:170px;">'.(isset($address['street'])?$address['street']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:370px;">'.(isset($address['tambon'])?$address['tambon']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:500px;">'.(isset($address['amphur'])?$address['amphur']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($address['province'])?$address['province']:'').'&nbsp;</div>

  <div style="position: absolute; top: 235px; left:160px;">'.(isset($address['zip'])?$address['zip']:'').'&nbsp;</div>
  <div style="position: absolute; top: 235px; left:260px;">'.(isset($address['phone'])?$address['phone']:'').'&nbsp;</div>
  <div style="position: absolute; top: 235px; left:430px;">'.(isset($address['fax'])?$address['fax']:'').'&nbsp;</div>
  <div style="position: absolute; top: 235px; left:590px;">'.(isset($address['email'])?$address['email']:'').'&nbsp;</div>

  <div style="position: absolute; top: 255px; left:215px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 255px; left:340px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 255px; left:435px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 255px; left:515px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 255px; left:615px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 270px; left:213px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 270px; left:260px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 270px; left:375px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 270px; left:450px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 270px; left:525px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 270px; left:675px;">'.(isset($record['health_status'])?$record['health_status']:'').'&nbsp;</div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($education['education'])?$education['education']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($education['place'])?$education['place']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($education['province'])?$education['province']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($education['year'])?$education['year']:'').'&nbsp;</div>
');

// ID Card
$split = str_split($profile['id_card'],1);
$mpdf->WriteHTML('
  <div style="position: absolute; top: 180px; left:220px;">'.$split[0].'</div>
  <div style="position: absolute; top: 180px; left:250px;">'.$split[1].'</div>
  <div style="position: absolute; top: 180px; left:270px;">'.$split[2].'</div>
  <div style="position: absolute; top: 180px; left:285px;">'.$split[3].'</div>
  <div style="position: absolute; top: 180px; left:305px;">'.$split[4].'</div>
  <div style="position: absolute; top: 180px; left:335px;">'.$split[5].'</div>
  <div style="position: absolute; top: 180px; left:350px;">'.$split[6].'</div>
  <div style="position: absolute; top: 180px; left:370px;">'.$split[7].'</div>
  <div style="position: absolute; top: 180px; left:390px;">'.$split[8].'</div>
  <div style="position: absolute; top: 180px; left:405px;">'.$split[9].'</div>
  <div style="position: absolute; top: 180px; left:435px;">'.$split[10].'</div>
  <div style="position: absolute; top: 180px; left:450px;">'.$split[11].'</div>
  <div style="position: absolute; top: 180px; left:480px;">'.$split[12].'</div>
');

// Work YES
$wy = array('ยานยนต์และชิ้นส่วน','เหล็กและเหล็กกล้า','เฟอร์นิเจอร์','อาหาร','ซอฟต์แวร์','ปิโตรเคมี','ไฟฟ้าและอิเล็กทรอนิกส์','สิ่งทอและแฟชั่น','เซรามิกส์','แม่พิมพ์','ก่อสร้าง','โลจิสติกส์','ท่องเที่ยวและบริการ','ผลิตภัณฑ์ยาง');
$work_yes_etc = '';
if ($work_yes['group'] != '' && ! in_array($work_yes['group'],$wy))
{
  $work_yes_etc = $work_yes['group'];
}
$mpdf->WriteHTML('
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['position'])?$work_yes['position']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['age'])?$work_yes['age']:'').'&nbsp;</div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['place'])?$work_yes['place']:'').'&nbsp;</div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['street'])?$work_yes['street']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['tambon'])?$work_yes['tambon']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['amphur'])?$work_yes['amphur']:'').'&nbsp;</div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['province'])?$work_yes['province']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['zip'])?$work_yes['zip']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['phone'])?$work_yes['phone']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_yes['fax'])?$work_yes['fax']:'').'&nbsp;</div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 215px; left:620px;">'.$work_yes_etc.'&nbsp;</div>
');

// Work NO
$wn = array('อยู่ระหว่างหางาน','นักเรียน/นักศึกษา','ทหารก่อนปลดประจำการ','ผู้อยู่ในสถานพินิจ','ผู้ต้องขัง','ผู้ประกันตนที่ถูกเลิกจ้าง');
$work_no_etc = '';
if ($record['work_no'] != '' && ! in_array($record['work_no'],$wn))
{
  $work_no_etc = $record['work_no'];
}
$mpdf->WriteHTML('
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 215px; left:620px;">'.$work_yes_etc.'&nbsp;</div>
');

// Used
$mpdf->WriteHTML('
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black; border-radius: 50%;"></div>
');

// Work NEED
$mpdf->WriteHTML('
  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($record['need_work_position'])?$record['need_work_position']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($record['need_work_group'])?$record['need_work_group']:'').'&nbsp;</div>

  <div style="position: absolute; top: 125px; left:95px; height: 13px; width: 13px; background-color: black;"></div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($record['need_work_country'])?$record['need_work_country']:'').'&nbsp;</div>
');

// Work ABROAD
$mpdf->WriteHTML('
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['agent'])?$work_abroad['agent']:'').'&nbsp;</div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['address'])?$work_abroad['address']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['street'])?$work_abroad['street']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['tambon'])?$work_abroad['tambon']:'').'&nbsp;</div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['amphur'])?$work_abroad['amphur']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['province'])?$work_abroad['province']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['zip'])?$work_abroad['zip']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['phone'])?$work_abroad['phone']:'').'&nbsp;</div>

  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['company'])?$work_abroad['company']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['country'])?$work_abroad['country']:'').'&nbsp;</div>
  <div style="position: absolute; top: 215px; left:620px;">'.(isset($work_abroad['duration'])?$work_abroad['duration']:'').'&nbsp;</div>
');

// exit();
$mpdf->Output();
?>

<?php
print_data($record);
print_data($profile);
print_data($address);
print_data($education);
print_data($work);
print_data($work_yes);
print_data($work_abroad);
print_data($reference);
exit();
?>
  <div class="">
    <div class="container" style="font-size: 4px !important;">
      <div class="row" style="padding: 0px; line-height: 25% !important;">
        <p class="text-right">แบบ กพร.201</p>
        <table class="table table-bordered">
          <tr>
            <td style="width:70%;">
              <h4 class="text-center" style="padding-top: 0px; font-size: 6px !important;">ใบสมัครเข้ารับการทดสอบฝีมือแรงงาน</h4>
              <p><img src="<?=base_url('assets/images/logo.jpg');?>" class="" style="width:75px;height:75px"> กรมพัฒนาฝีมือแรงงาน กระทรวงแรงงาน</p>
              <div class="row">
                <div class="col-xs-12" style="padding:0px;">
                  <span class="col-xs-8">
                    <?=form_checkbox('category','ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',set_checkbox('category','ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',($record['category']==='ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ')));?>ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ<br>
                    <?=form_checkbox('category','ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',set_checkbox('category','ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',($record['category']==='ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ')));?>ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ<br>
                    <?=form_checkbox('category','ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',set_checkbox('category','ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',($record['category']==='ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ')));?>ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ<br>
                    <?=form_checkbox('category','ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)',set_checkbox('category','ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)',($record['category']==='ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)')));?>ทดสอบ/รับรองฝีมือแรงงานนานาชาติ (ช่างเชื่อมมาตรฐานสากล)<br>
                  </span>
                  <span class="col-xs-4">
                    หน่วยงาน : <?=isset($record['department'])?$record['department']:'';?><br> สาขาอาชีพ : <?=isset($record['branch'])?$record['branch']:'';?><br> ระดับ : <?=isset($record['level'])?$record['level']:'';?><br>
                  </span>
                </div>
              </div>
            </td>
            <td class="text-center" style="width:30%;padding-top:2em;"> รูปถ่าย <br> 1 นิ้ว <br> </td>
          </tr>
          <tr>
            <td colspan="2">
              <b>1. ข้อมูลส่วนบุคคล</b>
              ชื่อ ..........<?=isset($profile['title'])?$profile['title']:''.nbs(2).isset($profile['firstname'])?$profile['firstname']:'';?>.......... นามสกุล ..........<?=isset($profile['lastname'])?$profile['lastname']:'';?>..........
              เพศ <?=form_checkbox('title','นาย',set_checkbox('title','นาย',($profile['title']=='นาย')));?> ชาย
              <?=form_checkbox('title','น',set_checkbox('title','น',($profile['title']!='นาย')));?> หญิง
              <div class="col-sm-12">
                <p style="margin:0px; padding:0px;"><b>1.1 ข้อมูลทั่วไป</b>
                  ..........<?=isset($profile['englishname'])?$profile['englishname']:'';?>..........
                  สัญชาติ ..........<?=$profile['nationality'];?>..........
                  ศาสนา ..........<?=$profile['religion'];?>.......... <br>
                  <?php $profile['id_card'] = (strlen($profile['id_card'])===13) ? $profile['id_card'] : str_repeat(0,13) ;
                  $split = str_split($profile['id_card'],1);
                  foreach ($split as $key => $value) : $split[$key] = '<span style="border:1px solid black;padding:0.1em;">'.$value.'</span>'; endforeach; ?>
                  เลขประจำตัวประชาชน <?=$split[0];?> - <?=$split[1].nbs().$split[2].nbs().$split[3].nbs().$split[4];?> - <?=$split[5].nbs().$split[6].nbs().$split[7].nbs().$split[8].nbs().$split[9];?> - <?=$split[10].nbs().$split[11];?> - <?=$split[12];?>
                  วัน เดือน ปีเกิด ..........<?=date('d',strtotime($profile['birthdate']));?> / <?=dropdown_month(date('m',strtotime($profile['birthdate'])));?> / <?=date('Y',strtotime($profile['birthdate']))+543;?>..........
                  อายุ ..........<?=age_calculate($profile['birthdate']);?>.......... ปึ
                </p>
                <p style="margin:0px; padding:0px;"><b>1.2 ที่อยู่ติดต่อได้</b>
                  บ้านเลขที่/หมู่ที่/หน่วยงาน/อาคาร ..........<?=isset($address['address'])?$address['address']:'';?>..........<br>
                  ถนน/ตรอกซอย ..........<?=isset($address['street'])?$address['street']:'';?>..........
                  ตำบล ..........<?=isset($address['tambon'])?$address['tambon']:'';?>..........
                  อำเภอ ..........<?=isset($address['amphur'])?$address['amphur']:'';?>..........
                  จังหวัด ..........<?=isset($address['province'])?$address['province']:'';?>..........<br>
                  รหัสไปรษณีย์ ..........<?=isset($address['zip'])?$address['zip']:'';?>..........
                  โทรศัพท์ ..........<?=isset($address['phone'])?$address['phone']:'';?>..........
                  โทรสาร ..........<?=isset($address['fax'])?$address['fax']:'';?>..........
                  อีเมล์ ..........<?=isset($address['email'])?$address['email']:'';?>..........
                </p>
                <p style="margin:0px; padding:0px;"><b>1.3 ประเภทผู้สมัคร</b>
                  <?=form_checkbox('type','ผู้รับการฝึกจาก กพร.',set_checkbox('type','ผู้รับการฝึกจาก กพร.',($record['type']==='ผู้รับการฝึกจาก กพร.')));?>ผู้รับการฝึกจาก กพร.
                  <?=form_checkbox('type','จากสถานศึกษา',set_checkbox('type','จากสถานศึกษา',($record['type']==='จากสถานศึกษา')));?>จากสถานศึกษา
                  <?=form_checkbox('type','จากภาครัฐ',set_checkbox('type','จากภาครัฐ',($record['type']==='จากภาครัฐ')));?>จากภาครัฐ
                  <?=form_checkbox('type','จากภาคเอกชน',set_checkbox('type','จากภาคเอกชน',($record['type']==='จากภาคเอกชน')));?>จากภาคเอกชน
                  <?=form_checkbox('type','บุคคลทั่วไป',set_checkbox('type','บุคคลทั่วไป',($record['type']==='บุคคลทั่วไป')));?>บุคคลทั่วไป
                </p>
                <p style="margin:0px; padding:0px;"><b>1.4 สภาพร่างกาย</b>
                  <?=form_checkbox('health','ปกติ',set_checkbox('health','ปกติ',($record['health']==='ปกติ')));?>ปกติ
                  <?=form_checkbox('health','พิการ',set_checkbox('health','พิการ',($record['health']==='พิการ')));?>พิการ
                  <b>ความพิการ</b>
                  <?=form_checkbox('health_status','การมองเห็น',set_checkbox('health_status','การมองเห็น',($record['health_status']==='การมองเห็น')));?>การมองเห็น
                  <?=form_checkbox('health_status','การได้ยิน',set_checkbox('health_status','การได้ยิน',($record['health_status']==='การได้ยิน')));?>การได้ยิน
                  <?=form_checkbox('health_status','การเคลื่อนไหว',set_checkbox('health_status','การเคลื่อนไหว',($record['health_status']==='การเคลื่อนไหว')));?>การเคลื่อนไหว
                  ระบุ พิการ ..........<?=( ! in_array($record['health_status'],array('การมองเห็น','การได้ยิน','การเคลื่อนไหว'))) ? $record['health_status'] : '';?>..........
                </p>
                <p style="margin:0px; padding:0px;"><b>1.5 ระดับการศึกษาสูงสุด</b>
                  <?php $edus = array('ประถมศึกษา','ม.3','ม.6','ปก.ศ.ต้น','ปก.ศ.สูง/อนุปริญญา','ปวช.','ปวท.','ปวส.','ปริญญาตรี','ปริญญาโท','ปริญญาเอก');
                  foreach ($edus as $key => $value) : echo form_checkbox('education[degree]',$value,set_checkbox('education[degree]',$value,($education['degree']===$value))).$value.nbs(3); endforeach; ?>
                  <br>
                  สาขาวิชา ..........<?=isset($education['branch'])?$education['branch']:'';?>..........
                  สถานศึกษา ..........<?=isset($education['place'])?$education['place']:'';?>..........
                  จังหวัด ..........<?=isset($education['province'])?$education['province']:'';?>..........
                  ปี พ.ศ.ที่สำเร็จ ..........<?=isset($education['year'])?$education['year']:'';?>..........
                </p>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <p style="margin:0px; padding:0px;"><b>2. ข้อมูลการทำงานในปัจจุบัน</b>(กรณีมีงานทำกรอกข้อ2.1 กรณีไม่มีงานทำกรอกข้อ2.2)</p>
                <div class="row">
                  <div class="col-xs-12">
                    <span class="col-xs-3"> <b>2.1 ผู้มีงานทำ</b> <br><b>สถานภาพการทำงาน</b> </span>
                    <span class="col-xs-9">
                      <br><?=form_checkbox('work_yes[category]','ทำงานภาครัฐ',($work_yes['category']=='ทำงานภาครัฐ'));?>ทำงานภาครัฐ
                      <br>( <?=form_radio('work_yes[type]','ข้าราชการพลเรือน',($work_yes['type']=='ข้าราชการพลเรือน'));?>)ข้าราชการพลเรือน
                      ( <?=form_radio('work_yes[type]','ข้าราชการตำรวจ',($work_yes['type']=='ข้าราชการตำรวจ'));?>)ข้าราชการตำรวจ
                      ( <?=form_radio('work_yes[type]','ข้าราชการทหาร',($work_yes['type']=='ข้าราชการทหาร'));?>)ข้าราชการทหาร
                      <br>( <?=form_radio('work_yes[type]','ข้าราชการครู',($work_yes['type']=='ข้าราชการครู'));?>)ข้าราชการครู
                      ( <?=form_radio('work_yes[type]','ข้าราชการอัยการ',($work_yes['type']=='ข้าราชการอัยการ'));?>)ข้าราชการอัยการ
                      ( <?=form_radio('work_yes[type]','ลูกจ้างประจำ',($work_yes['type']=='ลูกจ้างประจำ'));?>)ลูกจ้างประจำ
                      ( <?=form_radio('work_yes[type]','พนักงานราชการ',($work_yes['type']=='พนักงานราชการ'));?>)พนักงานราชการ
                      ( <?=form_radio('work_yes[type]','พนักงานจ้างเหมา',($work_yes['type']=='พนักงานจ้างเหมา'));?>)พนักงานจ้างเหมา
                      <br><?=form_checkbox('work_yes[category]','ทำงานภาคเอกชน',($work_yes['category']=='ทำงานภาคเอกชน'));?>ทำงานภาคเอกชน
                      ( <?=form_radio('work_yes[type]','พนักงาน/ลูกจ้างภาคเอกชน',($work_yes['type']=='พนักงาน/ลูกจ้างภาคเอกชน'));?>)พนักงาน/ลูกจ้างภาคเอกชน
                      <br><?=form_checkbox('work_yes[category]','ทำงานรัฐวิสาหกิจ',($work_yes['category']=='ทำงานรัฐวิสาหกิจ'));?>ทำงานรัฐวิสาหกิจ
                      ( <?=form_radio('work_yes[type]','พนักงาน/ลูกจ้างรัฐวิสาหกิจ',($work_yes['type']=='พนักงาน/ลูกจ้างรัฐวิสาหกิจ'));?>)พนักงาน/ลูกจ้างรัฐวิสาหกิจ
                      <br><?=form_checkbox('work_yes[category]','ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ',($work_yes['category']=='ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ'));?>ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ
                      ( <?=form_radio('work_yes[type]','ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน',($work_yes['type']=='ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน'));?>)ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน
                      ( <?=form_radio('work_yes[type]','ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง',($work_yes['type']=='ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง'));?>)ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง
                      <br>( <?=form_radio('work_yes[type]','เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)',($work_yes['type']=='เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'));?>)เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)
                      <br><?=form_checkbox('work_yes[category]','ช่วยธุรกิจครัวเรือน',($work_yes['category']=='ช่วยธุรกิจครัวเรือน'));?>ช่วยธุรกิจครัวเรือน
                      ( <?=form_radio('work_yes[type]','ลูกจ้างธุรกิจในครัวเรือน',($work_yes['type']=='ลูกจ้างธุรกิจในครัวเรือน'));?>)ลูกจ้างธุรกิจในครัวเรือน
                    </span>
                  </div>
                  <div class="col-xs-12">
                    <span class="col-xs-3"> <br><b>ประเภทการจ้าง/รายได้</b> <br>รายได้เฉลี่ยต่อเดือน </span>
                    <span class="col-xs-9">
                      <br><?=form_checkbox('work_yes[income]','รายเดือน',($work_yes['income']=='รายเดือน'));?>รายเดือน
                      <?=form_checkbox('work_yes[income]','รายสัปดาห์',($work_yes['income']=='รายสัปดาห์'));?>รายสัปดาห์
                      <?=form_checkbox('work_yes[income]','รายวัน',($work_yes['income']=='รายวัน'));?>รายวัน
                      <?=form_checkbox('work_yes[income]','รายชั่วโมง',($work_yes['income']=='รายชั่วโมง'));?>รายชั่วโมง
                      <?=form_checkbox('work_yes[income]','งานเหมา/รายชิ้น',($work_yes['income']=='งานเหมา/รายชิ้น'));?>งานเหมา/รายชิ้น
                      <br><?=form_checkbox('work_yes[income_amount]','1-5,000 บาท',($work_yes['income_amount']=='1-5,000 บาท'));?>1-5,000 บาท
                      <?=form_checkbox('work_yes[income_amount]','5,001-9,000 บาท',($work_yes['income_amount']=='5,001-9,000 บาท'));?>5,001-9,000 บาท
                      <?=form_checkbox('work_yes[income_amount]','9,001-15,000 บาท',($work_yes['income_amount']=='9,001-15,000 บาท'));?>9,001-15,000 บาท
                      <?=form_checkbox('work_yes[income_amount]','15,001-20,000 บาท',($work_yes['income_amount']=='15,001-20,000 บาท'));?>15,001-20,000 บาท
                      <br><?=form_checkbox('work_yes[income_amount]','20,001-30,000 บาท',($work_yes['income_amount']=='20,001-30,000 บาท'));?>20,001-30,000 บาท
                      <?=form_checkbox('work_yes[income_amount]','30,001-40,000 บาท',($work_yes['income_amount']=='30,001-40,000 บาท'));?>30,001-40,000 บาท
                      <?=form_checkbox('work_yes[income_amount]','40,001 บาทขึ้นไป',($work_yes['income_amount']=='40,001 บาทขึ้นไป'));?>40,001 บาทขึ้นไป
                    </span>
                  </div>
                  <div class="col-xs-12">
                    ตำแหน่ง/อาชีพ ..........<?=isset($work_yes['position'])?$work_yes['position']:NULL;?>..........
                    อายุงาน ..........<?=isset($work_yes['age'])?$work_yes['age']:NULL;?>.......... ปี
                    <b>สถานที่ทำงาน</b> ชื่อสถานประกอบกิจการ/เลขที่/หมู่ที่/อาคาร ..........<?=isset($work_yes['place'])?$work_yes['place']:NULL;?>..........
                    ถนน/ตรอกซอย ..........<?=isset($work_yes['street'])?$work_yes['street']:NULL;?>..........
                    ตำบล ..........<?=isset($work_yes['tambon'])?$work_yes['tambon']:NULL;?>..........
                    อำเภอ ..........<?=isset($work_yes['amphur'])?$work_yes['amphur']:NULL;?>..........
                    <br>จังหวัด ..........<?=isset($work_yes['province'])?$work_yes['province']:NULL;?>..........
                    รหัสไปรษณีย์ ..........<?=isset($work_yes['zip'])?$work_yes['zip']:NULL;?>..........
                    โทรศัพท์ ..........<?=isset($work_yes['phone'])?$work_yes['phone']:NULL;?>..........
                    โทรสาร ..........<?=isset($work_yes['fax'])?$work_yes['fax']:NULL;?>..........
                    <br>จำนวนลูกจ้างทั้งหมดในสถานประกอบการ ..........<?=$work_yes['employee_amount'];?>..........
                  </div>
                  <div class="col-xs-12">
                    <span class="col-xs-3"><b>กลุ่มอุตสาหกรรมที่ทำงาน</b></span>
                    <span class="col-xs-9">
                      (ตอบเฉพาะผู้ทำงานภาคเอกชน รัฐวิสาหกิจ ประกอบธุรกิจส่วนตัว และช่วยธุรกิจครัวเรือน)<br>
                      <?php $grp = array('ยานยนต์และชิ้นส่วน','เหล็กและเหล็กกล้า','เฟอร์นิเจอร์','อาหาร','ซอฟต์แวร์','ปิโตรเคมี','ไฟฟ้าและอิเล็กทรอนิกส์','สิ่งทอและแฟชั่น','เซรามิกส์','แม่พิมพ์','ก่อสร้าง','โลจิสติกส์','ท่องเที่ยวและบริการ','ผลิตภัณฑ์ยาง');
                      foreach ($grp as $key => $value) :
                      echo form_checkbox('work_yes[group]',$value,($work_yes['group']==$value)).$value.nbs(3);
                      echo ($key%5 == 4) ? '<br>' : '';
                      endforeach;
                      $work_yes_etc = '';
                      if ($work_yes['group'] != '' && ! in_array($work_yes['group'],$grp)) :
                      $work_yes_etc = '<div style="border:1px solid black;padding:0.1em;">'.$work_yes['group'].'</div>';
                      endif;
                      echo form_checkbox('work_yes[group]',$work_yes_etc,($work_yes['group']===$work_yes_etc)).' อื่นๆ ระบุ ..........'.$work_yes_etc; ?>..........
                    </span>
                  </div>
                  <div class="col-xs-12">
                    <span class="col-xs-3"><b>2.2 ผู้ไม่มีงานทำ</b></span>
                    <span class="col-xs-9">
                      <?php $wn = array('อยู่ระหว่างหางาน','นักเรียน/นักศึกษา','ทหารก่อนปลดประจำการ','ผู้อยู่ในสถานพินิจ','ผู้ต้องขัง','ผู้ประกันตนที่ถูกเลิกจ้าง');
                      foreach ($wn as $key => $value) :
                      echo '( '.form_radio('work_no',$value,($record['work_no']==$value)).')'.$value.nbs(3);
                      echo ($key%5 == 4) ? '<br>' : '';
                      endforeach;
                      $work_no_etc = '';
                      if ($record['work_no'] != '' && ! in_array($record['work_no'],$wn)) :
                      $work_no_etc = '<div style="border:1px solid black;padding:0.1em;">'.$record['work_no'].'</div>';
                      endif;
                      echo form_radio('work_yes[group]',$work_no_etc,($record['work_no']===$work_no_etc)).' อื่นๆ ระบุ ..........'.$work_no_etc; ?>..........
                    </span>
                  </div>
                </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-xs-12">
                  <span class="col-xs-3" style="padding:0px;"> <b>3. เคยเข้ารับการทดสอบ</b> </span>
                  <span class="col-xs-9">
                    <?=form_checkbox('used','เคย',($record['used']=='เคย'));?> เคย
                    <?=form_checkbox('used','ไม่เคย',($record['used']=='ไม่เคย'));?> ไม่เคย
                    ( <?=form_radio('used_place','จากกรมพัฒนาฝีมือแรงงาน',($record['used_place']=='จากกรมพัฒนาฝีมือแรงงาน'));?>) จากกรมพัฒนาฝีมือแรงงาน
                    ( <?=form_radio('used_place','ในสถานประกอบกิจการ',($record['used_place']=='ในสถานประกอบกิจการ'));?>) ในสถานประกอบกิจการ
                    ( <?=form_radio('used_place','จากหน่วยราชการอื่น',($record['used_place']=='จากหน่วยราชการอื่น'));?>) จากหน่วยราชการอื่น
                  </span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="col-sm-12" style="padding:0px;">
                <b>4. ความต้องการหางาน</b> มีความประสงค์จะให้กรมการจัดหางาน หางานให้เมื่อผ่านการทดสอบมาตรฐานฝีมือแรงงาน
                ( <?=form_radio('need_work_status','ไม่ต้องการ',($record['need_work_status']=='ไม่ต้องการ'));?>) ไม่ต้องการ
              </div>
              <div class="col-sm-3"> </div>
              <div class="col-sm-9">
                ( <?=form_radio('need_work_status','ต้องการจัดหางานในประเทศ',($record['need_work_status']=='ต้องการจัดหางานในประเทศ'));?>) ต้องการจัดหางานในประเทศ ตำแหน่ง/อาชีพ <?=$record['need_work_position'];?> กลุ่มอุตสาหกรรม <?=$record['need_work_group'];?>
                <br>( <?=form_radio('need_work_status','ต้องการจัดหางานในต่างประเทศ',($record['need_work_status']=='ต้องการจัดหางานในต่างประเทศ'));?>) ต้องการจัดหางานในต่างประเทศ ประเทศที่จะไปทำงาน <?=$record['need_work_country'];?>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <b>5. กรณีทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ / ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ</b>
              <div class="col-sm-12">
                ชื่อบริษัทจัดหางาน/สถานประกอบกิจการที่ขอทดสอบ ..........<?=isset($work_abroad['agent'])?$work_abroad['agent']:NULL;?>..........
                <br>เลขที่/หมู่ที่/ชื่อหน่วยงาน ..........<?=isset($work_abroad['address'])?$work_abroad['address']:NULL;?>..........
                ถนน/ตรอกซอย ..........<?=isset($work_abroad['street'])?$work_abroad['street']:NULL;?>..........
                ตำบล ..........<?=isset($work_abroad['tambon'])?$work_abroad['tambon']:NULL;?>..........
                <br>อำเภอ ..........<?=isset($work_abroad['amphur'])?$work_abroad['amphur']:NULL;?>..........
                จังหวัด ..........<?=isset($work_abroad['province'])?$work_abroad['province']:NULL;?>..........
                รหัสไปรษณีย์ ..........<?=isset($work_abroad['zip'])?$work_abroad['zip']:NULL;?>
                โทรศัพท์ ..........<?=isset($work_abroad['phone'])?$work_abroad['phone']:NULL;?>..........
                โทรสาร ..........<?=isset($work_abroad['fax'])?$work_abroad['fax']:NULL;?>..........
                <br>ชื่อบริษัทนายจ้างต่างประเทศ ..........<?=isset($work_abroad['company'])?$work_abroad['company']:NULL;?>..........
                ประเทศที่จะไปทำงาน ..........<?=isset($work_abroad['country'])?$work_abroad['country']:NULL;?>..........
                ระยะเวลาจ้าง ..........<?=isset($work_abroad['duration'])?$work_abroad['duration']:NULL;?>.......... ปี
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-xs-12">
                  <span class="col-xs-3" style="padding:0px;"><b>6. เหตุผลที่สมัครทดสอบ</b></span>
                  <span class="col-xs-9">
                    <?=form_checkbox('reason','ต้องการทราบฝีมือและความสามารถ',($record['reason']=='ต้องการทราบฝีมือและความสามารถ'));?> ต้องการทราบฝีมือและความสามารถ
                    <?=form_checkbox('reason','ต้องการมีงานทำ',($record['reason']=='ต้องการมีงานทำ'));?> ต้องการมีงานทำ
                    <?=form_checkbox('reason','เพื่อปรับหรือเลื่อนระดับตำแหน่งงาน',($record['reason']=='เพื่อปรับหรือเลื่อนระดับตำแหน่งงาน'));?> เพื่อปรับหรือเลื่อนระดับตำแหน่งงาน
                    <?=form_checkbox('reason','เพื่อปรับรายได้ให้สูงขึ้น',($record['reason']=='เพื่อปรับรายได้ให้สูงขึ้น'));?> เพื่อปรับรายได้ให้สูงขึ้น
                    <?=form_checkbox('reason','ได้รับการสนับสนุนจากหัวหน้า/ผู้บังคับบัญชา',($record['reason']=='ได้รับการสนับสนุนจากหัวหน้า/ผู้บังคับบัญชา'));?> ได้รับการสนับสนุนจากหัวหน้า/ผู้บังคับบัญชา
                    <?=form_checkbox('reason','ไปทำงานในต่างประเทศ',($record['reason']=='ไปทำงานในต่างประเทศ'));?> ไปทำงานในต่างประเทศ
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-xs-12">
                  <span class="col-xs-3" style="padding:0px;"><b>7. แหล่งที่ทราบข่าว</b></span>
                  <span class="col-xs-9">
                    <?=form_checkbox('source','วิทยุ',($record['source']=='วิทยุ'));?> วิทยุ
                    <?=form_checkbox('source','โทรทัศน์',($record['source']=='โทรทัศน์'));?> โทรทัศน์
                    <?=form_checkbox('source','สื่อสิ่งพิมพ์ ป้ายประกาศ',($record['source']=='สื่อสิ่งพิมพ์ ป้ายประกาศ'));?> สื่อสิ่งพิมพ์ ป้ายประกาศ
                    <?=form_checkbox('source','อินเทอร์เน็ต',($record['source']=='อินเทอร์เน็ต'));?> อินเทอร์เน็ต
                    <?=form_checkbox('source','สถาบัน/ศูนย์พัฒนาฝีมือแรงงาน',($record['source']=='สถาบัน/ศูนย์พัฒนาฝีมือแรงงาน'));?> สถาบัน/ศูนย์พัฒนาฝีมือแรงงาน
                    <?=form_checkbox('source','หน่วยงานอื่นสังกัดกระทรวงแรงงาน',($record['source']=='หน่วยงานอื่นสังกัดกระทรวงแรงงาน'));?> หน่วยงานอื่นสังกัดกระทรวงแรงงาน
                    <?=form_checkbox('source','สถานศึกษา',($record['source']=='สถานศึกษา'));?> สถานศึกษา
                    <?=form_checkbox('source','อบจ./อบต.',($record['source']=='อบจ./อบต.'));?> อบจ./อบต.
                    <?=form_checkbox('source','พ่อแม่ ญาติ พี่น้อง เพื่อน',($record['source']=='พ่อแม่ ญาติ พี่น้อง เพื่อน'));?> พ่อแม่ ญาติ พี่น้อง เพื่อน
                    <?=form_checkbox('source','กลุ่มอาชีพ กลุ่มสตรี กลุ่มสหกรณ์ กลุ่มออมทรัพย์',($record['source']=='กลุ่มอาชีพ กลุ่มสตรี กลุ่มสหกรณ์ กลุ่มออมทรัพย์'));?> กลุ่มอาชีพ กลุ่มสตรี กลุ่มสหกรณ์ กลุ่มออมทรัพย์
                    <?=form_checkbox('source','นายจ้าง',($record['source']=='นายจ้าง'));?> นายจ้าง
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-xs-12">
                  <span class="col-xs-12" style="padding:0px;"><b>8.ข้าพเจ้ายิมยอมเปิดเผยข้อมูลส่วนบุคคล</b> ให้กับหน่วยงานของรัฐและเอกชนทราบเพื่อประโยชน์ในการจัดหางานและบริหารแรงงานต่อไป</span>
                  <span class="col-xs-3"></span>
                  <span class="col-xs-9">
                    <?=form_checkbox('allow','1',($record['allow']=='1'));?> ยินยอมเปิดเผย
                    <?=form_checkbox('allow','2',($record['allow']=='2'));?> ไม่ยินยอมเปิดเผย
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="row">
                <div class="col-xs-12">
                  <span class="col-xs-5" style="border:1px solid gray; padding:0.5em; line-height: 20% !important;">
                    <p style="text-indent:4em;"><b>(เฉพาะเจ้าหน้าที่) ประเภทแรงงาน</b></p>
                    <p style="text-indent:4em;"> <?=form_checkbox();?>แรงงานในระบบ <?=form_checkbox();?>แรงงานนอกระบบ </p>
                    <p>เจ้าหน้าที่รับสมัคร ...................................</p>
                    <p>วันที่รับสมัคร ........../........../....................</p>
                    <p>วันที่ทดสอบ ........../........../....................</p>
                    <br>
                  </span>
                  <span class="col-xs-7" style="line-height: 10% !important;">
                    <p>ข้าพเจ้าขอรับรองว่าข้อความข้างต้นเป็นจริงทุกประการ และได้แนบหลักฐานประกอบการสมัครมาด้วย</p>
                    <p style="margin:0px; padding:0px;"><?=form_checkbox('reference[copy]','สำเนาวุฒิการศึกษาหรือหนังสือรับรองประสบการณ์ทำงาน',(isset($reference['copy'])));?> สำเนาวุฒิการศึกษาหรือหนังสือรับรองประสบการณ์ทำงาน </p>
                    <p style="margin:0px; padding:0px;"><?=form_checkbox('reference[refer]','สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน',(isset($reference['refer'])));?> สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน </p>
                    <p><?=form_checkbox('reference[etc]','อื่นๆ',(isset($reference['etc'])&&$reference['etc']!=''));?> อื่นๆ ..........<?=((isset($reference['etc'])&&$reference['etc']!='')?$reference['etc']:'');?>..........</p>
                    <br>
                    <p style="text-indent:4em;">ลงชื่อ ........................................ ผู้สมัคร</p>
                    <p style="text-indent:4em;">วันที่ ........................................</p>
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>

      </div>
      <div class="row hidden-print">
        <p>รายการไฟล์เอกสารแนบ</p>
        <ul>
          <?php if ($record['file_1']!='') { ?>
            <li><a href="<?=site_url('admin/approve/view_file/'.$record['file_1']);?>" target="_blank">เอกสารแนบ1</a></li>
          <?php } ?>
          <?php if ($record['file_2']!='') { ?>
            <li><a href="<?=site_url('admin/approve/view_file/'.$record['file_2']);?>" target="_blank">เอกสารแนบ2</a></li>
          <?php } ?>
          <?php if ($record['file_3']!='') { ?>
            <li><a href="<?=site_url('admin/approve/view_file/'.$record['file_3']);?>" target="_blank">เอกสารแนบ3</a></li>
          <?php } ?>
          <?php if ($record['file_4']!='') { ?>
            <li><a href="<?=site_url('admin/approve/view_file/'.$record['file_4']);?>" target="_blank">เอกสารแนบ4</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
