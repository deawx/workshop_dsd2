<div class="form-group"> <?=form_label('ระดับการศึกษาสูงสุด*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $e = array(''=>'เลือกรายการ',
      'ประถมศึกษา'=>'ประถมศึกษา',
      'ม.3'=>'ม.3',
      'ม.6'=>'ม.6',
      'ปก.ศ.ต้น'=>'ปก.ศ.ต้น',
      'ปก.ศ.สูง/อนุปริญญา'=>'ปก.ศ.สูง/อนุปริญญา',
      'ปวช.'=>'ปวช.',
      'ปวท.'=>'ปวท.',
      'ปวส.'=>'ปวส.',
      'ปริญญาตรี'=>'ปริญญาตรี',
      'ปริญญาโท'=>'ปริญญาโท',
      'ปริญญาเอก'=>'ปริญญาเอก');
    echo form_dropdown(array('name'=>'education[degree]','class'=>'form-control','readonly'=>TRUE),$e,set_value('education[degree]',isset($education['degree'])?$education['degree']:NULL));?>
  </div>
</div>
<div class="form-group"> <?=form_label('สาขาวิชา*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'education[department]','class'=>'form-control','readonly'=>TRUE),set_value('education[branch]',isset($education['department'])?$education['department']:NULL));?> </div>
</div>
<div class="form-group"> <?=form_label('สถานศึกษา*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'education[place]','class'=>'form-control','readonly'=>TRUE),set_value('education[place]',isset($education['place'])?$education['place']:NULL));?> </div>
</div>
<div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8"> <?=form_input(array('name'=>'education[province]','class'=>'form-control','readonly'=>TRUE),set_value('education[province]',($education['province']!='')?dropdown_province($education['province']):NULL));?> </div>
</div>
<div class="form-group"> <?=form_label('ปี พ.ศ.ที่สำเร็จ*','',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $y = array(''=>'ปี');
    foreach (range((date('Y')+543),'2520') as $value) $y[$value] = $value;
    echo form_dropdown(array('name'=>'education[year]','class'=>'form-control','readonly'=>TRUE),$y,set_value('education[year]',$education['year']));?>
  </div>
</div>
<hr>
<div class="form-group"> <?=form_label('ข้อมูลการทำงานในปัจจุบัน*','work_status',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $ws = array(''=>'เลือกรายการ','ผู้มีงานทำ'=>'ผู้มีงานทำ','ผู้ไม่มีงานทำ'=>'ผู้ไม่มีงานทำ');
    echo form_dropdown(array('name'=>'work_status','class'=>'form-control','id'=>'work_status','readonly'=>TRUE),$ws,set_value('work_status',isset($work['work_status'])?$work['work_status']:NULL));?>
  </div>
</div>

<?php if (isset($work)) : ?>
<?php else: ?>
<?php endif; ?>
<div class="form-group"> <?=form_label('สถานภาพ(ผู้ไม่มีงานทำ)*','work_no',array('class'=>'control-label col-md-4'));?>
  <div class="col-md-8">
    <?php $wn = array(
      'อยู่ระหว่างหางาน'=>'อยู่ระหว่างหางาน','นักเรียน/นักศึกษา'=>'นักเรียน/นักศึกษา',
      'ทหารก่อนปลดประจำการ'=>'ทหารก่อนปลดประจำการ','ผู้อยู่ในสถานพินิจ'=>'ผู้อยู่ในสถานพินิจ',
      'ผู้ต้องขัง'=>'ผู้ต้องขัง','ผู้ประกันตนที่ถูกเลิกจ้าง'=>'ผู้ประกันตนที่ถูกเลิกจ้าง');
      echo form_dropdown(array('name'=>'work_no','class'=>'form-control','id'=>'work_no','readonly'=>TRUE),$wn,set_value('work_no',isset($work['work_no'])?$work['work_no']:NULL));?>
    <p class="help-block">*ให้เลือกกรณีเป็นผู้ไม่มีงานทำ</p>
  </div>
</div>

<div id="work_yes">
  <div class="form-group"> <?=form_label('สถานภาพ(ผู้มีงานทำ)*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $w = array(''=>'เลือกรายการ',
        'ทำงานภาครัฐ'=>'ทำงานภาครัฐ',
        'ทำงานภาคเอกชน'=>'ทำงานภาคเอกชน',
        'ทำงานรัฐวิสาหกิจ'=>'ทำงานรัฐวิสาหกิจ',
        'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ'=>'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ',
        'ช่วยธุรกิจครัวเรือน'=>'ช่วยธุรกิจครัวเรือน');
      echo form_dropdown(array('name'=>'work_yes[category]','class'=>'form-control','id'=>'work_category','readonly'=>TRUE),$w,set_value('work_yes[category]',isset($work['work_yes']['category'])?$work['work_yes']['category']:NULL));?>
    </div>
  </div>
  <div class="form-group"> <?=form_label('ประเภทงาน*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?php $c = array(''=>'เลือกรายการ');
      echo form_dropdown(array('name'=>'work_yes[type]','class'=>'form-control','id'=>'work_type','readonly'=>TRUE),$c,set_value('work_yes[type]',isset($work['work_yes']['type'])?$work['work_yes']['type']:NULL));?>
    </div>
  </div>
  <div class="form-group"> <?=form_label('ประเภทอุตสาหกรรม*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $g = array(
        'ยานยนต์และชิ้นส่วน'=>'ยานยนต์และชิ้นส่วน','เหล็กและเหล็กกล้า'=>'เหล็กและเหล็กกล้า',
        'เฟอร์นิเจอร์'=>'เฟอร์นิเจอร์','อาหาร'=>'อาหาร','ซอฟต์แวร์'=>'ซอฟต์แวร์',
        'ปิโตรเคมี'=>'ปิโตรเคมี','ไฟฟ้าและอิเล็กทรอนิกส์'=>'ไฟฟ้าและอิเล็กทรอนิกส์',
        'สิ่งทอและแฟชั่น'=>'สิ่งทอและแฟชั่น','เซรามิกส์'=>'เซรามิกส์','แม่พิมพ์'=>'แม่พิมพ์',
        'ก่อสร้าง'=>'ก่อสร้าง','โลจิสติกส์'=>'โลจิสติกส์','ท่องเที่ยวและบริการ'=>'ท่องเที่ยวและบริการ',
        'ผลิตภัณฑ์ยาง'=>'ผลิตภัณฑ์ยาง');
        echo form_dropdown(array('name'=>'work_yes[group]','class'=>'form-control','id'=>'work_group','readonly'=>TRUE),$g,set_value('work_yes[group]',isset($work['work_yes']['group'])?$work['work_yes']['group']:NULL));?>
        <p class="help-block">*ให้เลือกกรณีไม่ได้ทำงานภาครัฐ</p>
    </div>
  </div>
  <div class="form-group"> <?=form_label('ประเภทการจ้าง*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $wi = array(''=>'เลือกรายการ',
        'รายเดือน'=>'รายเดือน','รายสัปดาห์'=>'รายสัปดาห์',
        'รายวัน'=>'รายวัน','รายชั่วโมง'=>'รายชั่วโมง',
        'งานเหมา/รายชิ้น'=>'งานเหมา/รายชิ้น');
      echo form_dropdown(array('name'=>'work_yes[income]','class'=>'form-control','readonly'=>TRUE),$wi,set_value('work_yes[income]',isset($work['work_yes']['income'])?$work['work_yes']['income']:NULL));?>
    </div>
  </div>
  <div class="form-group"> <?=form_label('รายได้เฉลี่ยต่อเดือน*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $wia = array(''=>'เลือกรายการ',
        '1-5,000 บาท'=>'1-5,000 บาท',
        '5,001-9,000 บาท'=>'5,001-9,000 บาท',
        '9,001-15,000 บาท'=>'9,001-15,000 บาท',
        '15,001-20,000 บาท'=>'15,001-20,000 บาท',
        '20,001-30,000 บาท'=>'20,001-30,000 บาท',
        '30,001-40,000 บาท'=>'30,001-40,000 บาท',
        '40,001 บาทขึ้นไป'=>'40,001 บาทขึ้นไป');
      echo form_dropdown(array('name'=>'work_yes[income_amount]','class'=>'form-control','readonly'=>TRUE),$wia,set_value('work_yes[income_amount]',isset($work['work_yes']['income_amount'])?$work['work_yes']['income_amount']:NULL));?>
    </div>
  </div>
  <div class="form-group"> <?=form_label('ตำแหน่ง/อาชีพ*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[position]','class'=>'form-control','readonly'=>TRUE),set_value('work_yes[position]',isset($work['work_yes']['position'])?$work['work_yes']['position']:NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('อายุงาน(ปี)*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[age]','class'=>'form-control','id'=>'age','readonly'=>TRUE),set_value('work_yes[age]',isset($work['work_yes']['age'])?$work['work_yes']['age']:NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('ชื่อสถานที่ทำงาน*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[place]','class'=>'form-control','readonly'=>TRUE),set_value('work_yes[place]',isset($work['work_yes']['place'])?$work['work_yes']['place']:NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[street]','class'=>'form-control','readonly'=>TRUE),set_value('work_yes[street]',isset($work['work_yes']['street'])?$work['work_yes']['street']:NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('ตำบล*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[tambon]','class'=>'form-control','readonly'=>TRUE),set_value('work_yes[tambon]',($work['work_yes']['tambon']!='')?dropdown_district($work['work_yes']['tambon']):NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('อำเภอ*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[amphur]','class'=>'form-control','readonly'=>TRUE),set_value('work_yes[amphur]',($work['work_yes']['amphur']!='')?dropdown_amphur($work['work_yes']['amphur']):NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[province]','class'=>'form-control','readonly'=>TRUE),set_value('work_yes[province]',($work['work_yes']['province']!='')?dropdown_province($work['work_yes']['province']):NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[zip]','class'=>'form-control zip','readonly'=>TRUE),set_value('work_yes[zip]',isset($work['work_yes']['zip'])?$work['work_yes']['zip']:NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('โทรศัพท์*','phone',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[phone]','class'=>'form-control tel','max_length'=>'10','readonly'=>TRUE),set_value('work_yes[phone]',isset($work['work_yes']['phone'])?$work['work_yes']['phone']:NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[fax]','class'=>'form-control tel','max_length'=>'10','readonly'=>TRUE),set_value('work_yes[fax]',isset($work['work_yes']['fax'])?$work['work_yes']['fax']:NULL));?> </div>
  </div>
  <div class="form-group"> <?=form_label('จำนวนลูกจ้างทั้งหมด*','',array('class'=>'control-label col-md-4'));?>
    <div class="col-md-8">
      <?php $e = array(''=>'เลือกรายการ','1-100 คน'=>'1-100 คน','101-200 คน'=>'101-200 คน','201-300 คน'=>'201-300 คน','301 คนขึ้นไป'=>'301 คนขึ้นไป');
      echo form_dropdown(array('name'=>'work_yes[employee_amount]','class'=>'form-control','readonly'=>TRUE),$e,set_value('work_yes[employee_amount]',isset($work['work_yes']['employee_amount'])?$work['work_yes']['employee_amount']:NULL));?>
    </div>
  </div>
</div>
