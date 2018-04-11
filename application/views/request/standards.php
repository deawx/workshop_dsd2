<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> </h3> </div>
  <?=form_open(uri_string(),array('class'=>'form-horizontal','autocomplete'=>'off'));?>
  <?=form_hidden('user_id',$this->session->user_id);?>
  <div class="panel-body">

    <div class="form-group"> <?=form_label('หน่วยงาน*','department',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'department','class'=>'form-control','readonly'=>TRUE),set_value('department','ศูนย์พัฒนาฝีมือแรงงานจังหวัดประจวบคีรีขันธ์'));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สาขาอาชีพ*','branch',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'branch','class'=>'form-control'),set_value('branch'));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ระดับ*','level',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_dropdown(array('name'=>'level','class'=>'form-control'),array(''=>'เลือกรายการ','1'=>'1','2'=>'2','3'=>'3'),set_value('level'));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ประเภทการสอบ*','category',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $c = array(''=>'เลือกรายการ',
          'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ'=>'ทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ',
          'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ'=>'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ',
          'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ'=>'ทดสอบฝีมือแรงงานตามความต้องการของสถานประกอบกิจการ',
          'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)'=>'ทดสอบ/รับรองฝีมือแรงงานนานาชาติ(ช่างเชื่อมมาตรฐานสากล)');
        echo form_dropdown(array('name'=>'category','class'=>'form-control','id'=>'ctg'),$c,set_value('category'));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ประวัติการเข้าทดสอบ','used',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $tf = array(''=>'เลือกรายการ','เคย'=>'เคย','ไม่เคย'=>'ไม่เคย');
        echo form_dropdown(array('name'=>'used','class'=>'form-control','id'=>'tf'),$tf,set_value('used'));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สถานที่เข้ารับการทดสอบ','used_place',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $t = array(''=>'เลือกรายการ',
          'จากกรมพัฒนาฝีมือแรงงาน'=>'จากกรมพัฒนาฝีมือแรงงาน',
          'ในสถานประกอบกิจการ'=>'ในสถานประกอบกิจการ',
          'จากหน่วยงานราชการอื่น'=>'จากหน่วยงานราชการอื่น');
        echo form_dropdown(array('name'=>'used_place','class'=>'form-control tf_t'),$t,set_value('used_place'));?>
        <p class="help-block">*ให้เลือกกรณีเคยมีประวัติการเข้าทดสอบ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('เหตุผลที่สมัครทดสอบ','reason',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $r = array(
          'ต้องการทราบฝีมือและความสามารถ'=>'ต้องการทราบฝีมือและความสามารถ',
          'ต้องการมีงานทำ'=>'ต้องการมีงานทำ','เพื่อปรับหรือเลื่อนระดับตำแหน่งงาน'=>'เพื่อปรับหรือเลื่อนระดับตำแหน่งงาน',
          'เพื่อปรับรายได้ให้สูงขึ้น'=>'เพื่อปรับรายได้ให้สูงขึ้น','ได้รับการสนับสนุนจากหัวหน้า/ผู้บังคับบัญชา'=>'ได้รับการสนับสนุนจากหัวหน้า/ผู้บังคับบัญชา',
          'ไปทำงานในต่างประเทศ'=>'ไปทำงานในต่างประเทศ');
        echo form_dropdown(array('name'=>'reason','class'=>'form-control tf_f','multiple'=>TRUE),$r,set_value('reason'));?>
        <p class="help-block">*กดปุ่ม ctrl บนคีย์บอร์ดหากต้องการเลือกหลายรายการ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('แหล่งที่ทราบข่าว','source',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $s = array(
          'วิทยุ'=>'วิทยุ','โทรทัศน์'=>'โทรทัศน์','สื่อสิ่งพิมพ์'=>'สื่อสิ่งพิมพ์',
          'ป้ายประกาศ'=>'ป้ายประกาศ','อินเตอร์เน็ต'=>'อินเตอร์เน็ต',
          'สถาบัน/ศูนย์พัฒนาฝีมือแรงงาน'=>'สถาบัน/ศูนย์พัฒนาฝีมือแรงงาน',
          'หน่วยงานอื่นสังกัดกระทรวงแรงงาน'=>'หน่วยงานอื่นสังกัดกระทรวงแรงงาน',
          'อบจ./อบต.'=>'อบจ./อบต.','พ่อ แม่ ญาติ พี่น้อง เพื่อน'=>'พ่อ แม่ ญาติ พี่น้อง เพื่อน',
          'กลุ่มอาชีพ กลุ่มสตรี กลุ่มสหกรณ์ กลุ่มออมทรัพย์'=>'กลุ่มอาชีพ กลุ่มสตรี กลุ่มสหกรณ์ กลุ่มออมทรัพย์','นายจ้าง'=>'นายจ้าง');
        echo form_dropdown(array('name'=>'source','class'=>'form-control tf_f','multiple'=>TRUE),$s,set_value('source'));?>
        <p class="help-block">*กดปุ่ม ctrl บนคีย์บอร์ดหากต้องการเลือกหลายรายการ</p>
      </div>
    </div>

    <div class="form-group"> <?=form_label('คำนำหน้าชื่อ*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[title]','class'=>'form-control','value'=>$user['title'],'readonly'=>TRUE));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ชื่อ*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[firstname]','class'=>'form-control','value'=>$user['firstname'],'readonly'=>TRUE));?> </div>
    </div>
    <div class="form-group"> <?=form_label('นามสกุล*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[lastname]','class'=>'form-control','value'=>$user['lastname'],'readonly'=>TRUE));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ชื่อเต็ม(ภาษาอังกฤษ)*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[englishname]','class'=>'form-control','value'=>$user['englishname'],'readonly'=>TRUE));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ศาสนา*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[religion]','class'=>'form-control','value'=>$user['religion'],'readonly'=>TRUE));?> </div>
    </div>
    <div class="form-group"> <?=form_label('สัญชาติ*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[nationality]','class'=>'form-control','value'=>$user['nationality'],'readonly'=>TRUE));?> </div>
    </div>
    <div class="form-group"> <?=form_label('หมายเลขบัตรประชาชน*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'profile[id_card]','class'=>'form-control','id'=>'id_card','value'=>$user['id_card'],'readonly'=>TRUE));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ว/ด/ป เกิด*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-2">
        <?php $d = array(''=>'วัน');
        foreach (range('1','31') as $value) $d[$value] = $value;
        echo form_dropdown(array('name'=>'d','class'=>'form-control','disabled'=>TRUE),$d,set_value('d',explode('-',$user['birthdate'])[2]));?>
      </div>
      <div class="col-md-3">
        <?=form_dropdown(array('name'=>'m','class'=>'form-control','disabled'=>TRUE),dropdown_month(),set_value('m',explode('-',$user['birthdate'])[1]));?>
      </div>
      <div class="col-md-3">
        <?php $y = array(''=>'ปี พ.ศ.');
        foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
        echo form_dropdown(array('name'=>'y','class'=>'form-control','disabled'=>TRUE),$y,set_value('y',explode('-',$user['birthdate'])[0]));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[address]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['address']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[street]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['street']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[tambon]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['tambon']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[amphur]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['amphur']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[province]','class'=>'form-control','readonly'=>TRUE,'value'=>$address_current['province']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[zip]','class'=>'form-control zip','readonly'=>TRUE,'value'=>$address_current['zip']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('อีเมล์*','email',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_email(array('name'=>'address_current[email]','class'=>'form-control','readonly'=>TRUE,'value'=>$user['email']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('โทรศัพท์*','phone',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[phone]','class'=>'form-control tel','max_length'=>'10','readonly'=>TRUE,'value'=>$user['phone']));?> </div>
    </div>
    <div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'address_current[fax]','class'=>'form-control tel','max_length'=>'10','readonly'=>TRUE,'value'=>$user['fax']));?> </div>
    </div>

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
        echo form_dropdown(array('name'=>'education[degree]','class'=>'form-control','disabled'=>TRUE),$e,set_value('education[degree]',isset($education['degree'])?$education['degree']:NULL));?>
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
        echo form_dropdown(array('name'=>'education[year]','class'=>'form-control','disabled'=>TRUE),$y,set_value('education[year]',$education['year']));?>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('ข้อมูลการทำงานในปัจจุบัน*','work_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $ws = array(''=>'เลือกรายการ','ผู้มีงานทำ'=>'ผู้มีงานทำ','ผู้ไม่มีงานทำ'=>'ผู้ไม่มีงานทำ');
        echo form_dropdown(array('name'=>'work_status','class'=>'form-control','id'=>'work_status','disabled'=>TRUE),$ws,set_value('work_status',isset($work['work_status'])?$work['work_status']:NULL));?>
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
          echo form_dropdown(array('name'=>'work_no','class'=>'form-control','id'=>'work_no','disabled'=>TRUE),$wn,set_value('work_no',isset($work['work_no'])?$work['work_no']:NULL));?>
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
          echo form_dropdown(array('name'=>'work_yes[category]','class'=>'form-control','id'=>'work_category','disabled'=>TRUE),$w,set_value('work_yes[category]',isset($work['work_yes']['category'])?$work['work_yes']['category']:NULL));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ประเภทงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?php $c = array(''=>'เลือกรายการ');
          echo form_dropdown(array('name'=>'work_yes[type]','class'=>'form-control','id'=>'work_type','disabled'=>TRUE),$c,set_value('work_yes[type]',isset($work['work_yes']['type'])?$work['work_yes']['type']:NULL));?>
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
            echo form_dropdown(array('name'=>'work_yes[group]','class'=>'form-control','id'=>'work_group','disabled'=>TRUE),$g,set_value('work_yes[group]',isset($work['work_yes']['group'])?$work['work_yes']['group']:NULL));?>
            <p class="help-block">*ให้เลือกกรณีไม่ได้ทำงานภาครัฐ</p>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ประเภทการจ้าง*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $wi = array(''=>'เลือกรายการ',
            'รายเดือน'=>'รายเดือน','รายสัปดาห์'=>'รายสัปดาห์',
            'รายวัน'=>'รายวัน','รายชั่วโมง'=>'รายชั่วโมง',
            'งานเหมา/รายชิ้น'=>'งานเหมา/รายชิ้น');
          echo form_dropdown(array('name'=>'work_yes[income]','class'=>'form-control','disabled'=>TRUE),$wi,set_value('work_yes[income]',isset($work['work_yes']['income'])?$work['work_yes']['income']:NULL));?>
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
          echo form_dropdown(array('name'=>'work_yes[income_amount]','class'=>'form-control','disabled'=>TRUE),$wia,set_value('work_yes[income_amount]',isset($work['work_yes']['income_amount'])?$work['work_yes']['income_amount']:NULL));?>
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
          echo form_dropdown(array('name'=>'work_yes[employee_amount]','class'=>'form-control','disabled'=>TRUE),$e,set_value('work_yes[employee_amount]',isset($work['work_yes']['employee_amount'])?$work['work_yes']['employee_amount']:NULL));?>
        </div>
      </div>
    </div>

    <div class="form-group">
      <?=form_label('ความต้องการหางาน*','need_work_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $tt = array(''=>'เลือกรายการ',
          'ไม่ต้องการ'=>'ไม่ต้องการ',
          'ต้องการจัดหางานในประเทศ'=>'ต้องการจัดหางานในประเทศ',
          'ต้องการจัดหางานในต่างประเทศ'=>'ต้องการจัดหางานในต่างประเทศ');
        echo form_dropdown(array('name'=>'need_work_status','class'=>'form-control','id'=>'need_work_status'),$tt,set_value('need_work_status'));?>
      </div>
    </div>
    <div id="local">
      <div class="form-group"> <?=form_label('ตำแหน่ง/อาชีพ*','need_work_position',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_position','class'=>'form-control'),set_value('need_work_position')); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('กลุ่มอุตสาหกรรม*','need_work_group',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_group','class'=>'form-control'),set_value('need_work_group')); ?>
          <p class="help-block">*ให้เลือกกรณีจัดหางานในประเทศ</p>
        </div>
      </div>
    </div>
    <div id="abroad">
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน*','need_work_country',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'need_work_country','class'=>'form-control'),set_value('need_work_country')); ?>
          <p class="help-block">*ให้เลือกกรณีจัดหางานในต่างประเทศ</p>
        </div>
      </div>
    </div>
    <hr>
    <div id="ctg_ctn">
      <div class="form-group"> <?=form_label('ชื่อบริษัทจัดหางาน/สถานที่ทำงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[agent]','class'=>'form-control'),set_value('work_abroad[agent]'));?>
          <p class="help-block">*กรณีทดสอบฝีมือแรงงานเพื่อไปทำงานในต่างประเทศ</p>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อบริษัทนายจ้าง*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[company]','class'=>'form-control'),set_value('work_abroad[company]'));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('เลขที่/หมู่ที่/ชื่อหน่วยงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[address]','class'=>'form-control'),set_value('work_abroad[address]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[street]','class'=>'form-control'),set_value('work_abroad[street]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[tambon]','class'=>'form-control'),set_value('work_abroad[tambon]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[amphur]','class'=>'form-control'),set_value('work_abroad[amphur]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[province]','class'=>'form-control'),set_value('work_abroad[province]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[zip]','class'=>'form-control zip'),set_value('work_abroad[zip]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('เบอร์โทรศัพท์*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[phone]','class'=>'form-control tel'),set_value('work_abroad[phone]'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ประเทศที่จะไปทำงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[country]','class'=>'form-control'),set_value('work_abroad[country]')); ?> </div>
      </div>
      <div class="form-group"> <?=form_label('ระยะเวลาจ้าง*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_abroad[duration]','class'=>'form-control','id'=>'duration','maxlength'=>'2'),set_value('work_abroad[duration]'));?> </div>
      </div>
    </div>

    <div class="form-group"> <?=form_label('ประเภทผู้สมัคร*','type',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $c = array(''=>'เลือกรายการ',
        'ผู้รับการฝึกจาก กพร.'=>'ผู้รับการฝึกจาก กพร.',
        'จากสถานศึกษา'=>'จากสถานศึกษา',
        'จากภาครัฐ'=>'จากภาครัฐ',
        'จากภาคเอกชน'=>'จากภาคเอกชน',
        'บุคคลทั่วไป'=>'บุคคลทั่วไป');
        echo form_dropdown(array('name'=>'type','class'=>'form-control'),$c,set_value('type'));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('สภาพร่างกาย*','health',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $h = array(''=>'เลือกรายการ','ปกติ'=>'ปกติ','พิการ'=>'พิการ');
        echo form_dropdown(array('name'=>'health','class'=>'form-control','id'=>'health'),$h,set_value('health'));?>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ความพิการ','health_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php $hs = array('การมองเห็น'=>'การมองเห็น','การได้ยิน'=>'การได้ยิน','การเคลื่อนไหว'=>'การเคลื่อนไหว');
        echo form_dropdown(array('name'=>'health_status','class'=>'form-control','id'=>'health_status'),$hs,set_value('health_status'));?>
        <p class="help-block">*ให้เลือกกรณีสถาพร่างกายพิการ</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('เอกสารที่แนบมาด้วย*','reference',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[refer]'),'สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน',set_value('reference[refer]'));?>สำเนาวุฒิการศึกษาหรือหนังสือรับรองการทำงาน</label> </div>
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'reference[copy]'),'สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน',set_value('reference[copy]'));?>สำเนาบัตรประจำตัวประชาชนหรือสำเนาทะเบียนบ้าน</label> </div>
        <p class="help-block"></p>
        <?=form_input(array('name'=>'reference[etc]','class'=>'form-control','placeholder'=>'อื่นๆ'),set_value(''));?>
        <p class="help-block">*ข้าพเจ้าขอรับรองว่าข้อความข้างต้นเป็นความจริงทุกประการและได้แนบหลักฐานการสมัครมาด้วย</p>
      </div>
    </div>
    <div class="form-group"> <?=form_label('ยอมรับการเปิดเผยข้อมูล*','allow',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <div class="checkbox"> <label><?=form_checkbox(array('name'=>'allow'),TRUE,set_value('allow'));?>ยอมรับ</label> </div>
        <br>
        <p>*ข้าพเจ้ายินยอมเปิดเผยข้อมูลส่วนบุคคลให้กับหน่วยงานของรัฐและเอกชนทราบเพื่อประโยชน์ในการจัดหางานและบริหารแรงงานต่อไป</p>
        <p>*มีค่าธรรมเนียมในการประเมิน 100 บาทถ้วน</p>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('แนบไฟล์เอกสารหลักฐาน','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_upload(array('name'=>'file_1')); ?> <br>
        <?php echo form_upload(array('name'=>'file_2')); ?> <br>
        <?php echo form_upload(array('name'=>'file_3')); ?> <br>
        <?php echo form_upload(array('name'=>'file_4')); ?>
      </div>
    </div>
    <hr>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary btn-block'));?> </div>
    </div>

  </div>
  <?=form_close();?>
  <div class="panel-footer">
    <?php $this->load->view('_partials/messages'); ?>
  </div>
</div>

<script type="text/javascript">
$(function() {
  $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    var $target = $(e.target);
    if ($target.parent().hasClass('disabled')) {
      return false;
    }
  });
  $(".next-step").click(function (e) {
    var $active = $('.nav-pills li.active');
    // $active.next().addClass('active');
    nextTab($active);
  });
  $(".prev-step").click(function (e) {
    var $active = $('.nav-pills li.active');
    prevTab($active);
  });

  var work_category = $('#work_category');
  var ctg = $('#ctg');
  var ctg_ctn = $('#ctg_ctn :input');
  var work_type = $('#work_type');
  var work_status = $('#work_status');
  var work_yes = $('#work_yes :input');
  var need_work_status = $('#need_work_status');
  var local = $('div#local :input');
  var abroad = $('div#abroad :input');
  var health = $('#health');
  var tf = $('#tf');
  var tf_t = $('.tf_t');
  var tf_f = $('.tf_f');

  tf_t.prop('disabled',true);
  tf_f.prop('disabled',true);
  tf.on('change',function(){
    if (this.value === 'เคย') {
      tf_t.prop('disabled',false);
      tf_f.prop('disabled',true);
    } else if(this.value === 'ไม่เคย') {
      tf_t.prop('disabled',true);
      tf_f.prop('disabled',false);
    } else {
      tf_t.prop('disabled',true);
      tf_f.prop('disabled',true);
    }
  });

  <?php if (isset($work['work_status']) && $work['work_status']=='ผู้มีงานทำ') : ?>
    $('#work_no').prop('disabled',true);
  <?php else: ?>
    work_yes.prop('disabled',true);
  <?php endif; ?>
  work_status.on('change',function(){
    if (this.value === 'ผู้มีงานทำ') {
      work_yes.prop('disabled',false);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',false);
    } else if (this.value === 'ผู้ไม่มีงานทำ') {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',false);
      $('#work_group').prop('disabled',true);
    } else {
      work_yes.prop('disabled',true);
      $('#work_no').prop('disabled',true);
      $('#work_group').prop('disabled',true);
    }
  });

  work_category.on('change',function(){
    $.post('get_work_type/'+this.value,function(data) {
      work_type.empty();
      $.each(data,function(key,value) {
        work_type.append('<option value="'+key+'">'+value+'</option>');
      });
    });
    if (this.value !== 'ทำงานภาครัฐ') {
      $('#work_group').prop('disabled',false);
    } else {
      $('#work_group').prop('disabled',true);
    }
  });

  local.prop('disabled',true);
  abroad.prop('disabled',true);
  need_work_status.on('change',function(){
    if (this.value === 'ไม่ต้องการ') {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในประเทศ') {
      local.prop('disabled',false);
      abroad.prop('disabled',true);
    } else if(this.value === 'ต้องการจัดหางานในต่างประเทศ') {
      local.prop('disabled',true);
      abroad.prop('disabled',false);
    } else {
      local.prop('disabled',true);
      abroad.prop('disabled',true);
    }
  });

  ctg_ctn.prop('disabled',true);
  ctg.on('change',function(){
    if (this.value === 'ทดสอบฝีมือคนหางานเพื่อไปทำงานในต่างประเทศ') {
      ctg_ctn.prop('disabled',false);
    } else {
      ctg_ctn.prop('disabled',true);
    }
  });

  $('#health_status').prop('disabled',true);
  health.on('change',function(){
    if (this.value == 'พิการ') {
      $('#health_status').prop('disabled',false);
    } else {
      $('#health_status').prop('disabled',true);
    }
  });

  $('#work_no').editableSelect();
  $('#work_group').editableSelect();
  $('#health_status').editableSelect();

  $('#age').inputmask('99');
  $('#id_card').inputmask('9999999999999');
  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');
});

function nextTab(elem) {
  $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>
