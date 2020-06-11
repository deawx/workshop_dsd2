<?php
$work = unserialize($user['work']);
?>
<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลการทำงาน <small><?=lang('edit_user_subheading');?></small> </h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$user['id']);?>

    <div class="form-group"> <?=form_label('ข้อมูลการทำงานในปัจจุบัน*','work_status',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $ws = array(''=>'เลือกรายการ','ผู้มีงานทำ'=>'ผู้มีงานทำ','ผู้ไม่มีงานทำ'=>'ผู้ไม่มีงานทำ');
        echo form_dropdown(array('name'=>'work_status','class'=>'form-control','id'=>'work_status'),$ws,set_value('work_status',isset($work['work_status'])?$work['work_status']:NULL));?>
      </div>
    </div>

    <div class="form-group"> <?=form_label('สถานภาพ(ผู้ไม่มีงานทำ)*','work_no',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php $wn = array(
          'อยู่ระหว่างหางาน'=>'อยู่ระหว่างหางาน','นักเรียน/นักศึกษา'=>'นักเรียน/นักศึกษา',
          'ทหารก่อนปลดประจำการ'=>'ทหารก่อนปลดประจำการ','ผู้อยู่ในสถานพินิจ'=>'ผู้อยู่ในสถานพินิจ',
          'ผู้ต้องขัง'=>'ผู้ต้องขัง','ผู้ประกันตนที่ถูกเลิกจ้าง'=>'ผู้ประกันตนที่ถูกเลิกจ้าง');
        echo form_dropdown(array('name'=>'work_no','class'=>'form-control','id'=>'work_no'),$wn,set_value('work_no',isset($work['work_no'])?$work['work_no']:NULL));?>
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
          echo form_dropdown(array('name'=>'work_yes[category]','class'=>'form-control','id'=>'work_category'),$w,set_value('work_yes[category]',isset($work['work_yes']['category'])?$work['work_yes']['category']:NULL));?>
          <p class="help-block">*ให้เลือกกรณีเป็นผู้มีงานทำ</p>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ประเภทงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?php echo form_dropdown(array('name'=>'work_yes[type]','class'=>'form-control','id'=>'work_type'),dropdown_worktype(),set_value('work_yes[type]',isset($work['work_yes']['type'])?$work['work_yes']['type']:NULL));?>
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
          echo form_dropdown(array('name'=>'work_yes[group]','class'=>'form-control','id'=>'work_group'),$g,set_value('work_yes[group]',isset($work['work_yes']['group'])?$work['work_yes']['group']:NULL));?>
          <p class="help-block">*ให้เลือกกรณีไม่ได้ทำงานภาครัฐ</p>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ประเภทการจ้าง*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $wi = array(''=>'เลือกรายการ',
          'รายเดือน'=>'รายเดือน','รายสัปดาห์'=>'รายสัปดาห์',
          'รายวัน'=>'รายวัน','รายชั่วโมง'=>'รายชั่วโมง',
          'งานเหมา/รายชิ้น'=>'งานเหมา/รายชิ้น');
          echo form_dropdown(array('name'=>'work_yes[income]','class'=>'form-control'),$wi,set_value('work_yes[income]',isset($work['work_yes']['income'])?$work['work_yes']['income']:NULL));?>
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
          echo form_dropdown(array('name'=>'work_yes[income_amount]','class'=>'form-control'),$wia,set_value('work_yes[income_amount]',isset($work['work_yes']['income_amount'])?$work['work_yes']['income_amount']:NULL));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('ตำแหน่ง/อาชีพ*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[position]','class'=>'form-control'),set_value('work_yes[position]',isset($work['work_yes']['position'])?$work['work_yes']['position']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อายุงาน(ปี)*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[age]','class'=>'form-control','id'=>'age'),set_value('work_yes[age]',isset($work['work_yes']['age'])?$work['work_yes']['age']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อสถานที่ทำงาน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[place]','class'=>'form-control'),set_value('work_yes[place]',isset($work['work_yes']['place'])?$work['work_yes']['place']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?=form_input(array('name'=>'work_yes[street]','class'=>'form-control'),set_value('work_yes[street]',isset($work['work_yes']['street'])?$work['work_yes']['street']:NULL));?>
          <p class="help-block">*ถ้าไม่มีข้อมูลให้ใส่เครื่องหมาย -</p>
        </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_dropdown(array('name'=>'work_yes[province]','class'=>'form-control','id'=>'province'),dropdown_province(),set_value('work_yes[province]',isset($work['work_yes']['province'])?$work['work_yes']['province']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_dropdown(array('name'=>'work_yes[amphur]','class'=>'form-control','id'=>'amphur'),dropdown_amphur(),set_value('work_yes[amphur]',isset($work['work_yes']['amphur'])?$work['work_yes']['amphur']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_dropdown(array('name'=>'work_yes[tambon]','class'=>'form-control','id'=>'district'),dropdown_district(),set_value('work_yes[tambon]',isset($work['work_yes']['tambon'])?$work['work_yes']['tambon']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[zip]','class'=>'form-control zip'),set_value('work_yes[zip]',isset($work['work_yes']['zip'])?$work['work_yes']['zip']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรศัพท์*','phone',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[phone]','class'=>'form-control tel','max_length'=>'10'),set_value('work_yes[phone]',isset($work['work_yes']['phone'])?$work['work_yes']['phone']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรสาร*','fax',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'work_yes[fax]','class'=>'form-control tel','max_length'=>'10'),set_value('work_yes[fax]',isset($work['work_yes']['fax'])?$work['work_yes']['fax']:NULL));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จำนวนลูกจ้างทั้งหมด*','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8">
          <?php $e = array(''=>'เลือกรายการ','1-100 คน'=>'1-100 คน','101-200 คน'=>'101-200 คน','201-300 คน'=>'201-300 คน','301 คนขึ้นไป'=>'301 คนขึ้นไป');
          echo form_dropdown(array('name'=>'work_yes[employee_amount]','class'=>'form-control'),$e,set_value('work_yes[employee_amount]',isset($work['work_yes']['employee_amount'])?$work['work_yes']['employee_amount']:NULL));?>
        </div>
      </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?=form_reset('','ล้าง',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<script type="text/javascript">
$(function() {
  var work_category = $('#work_category');
  var work_type = $('#work_type');
  var work_status = $('#work_status');
  var work_yes = $('#work_yes :input');
  var province = $('#province');
  var amphur = $('#amphur');
  var district = $('#district');

  console.log(work_status.val());

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

  if (work_status.val() == 'ผู้มีงานทำ')
  {
    work_yes.prop('disabled',false);
    $('#work_no').prop('disabled',true);
  }
  else if (work_status.val() == 'ผู้ไม่มีงานทำ')
  {
    work_yes.prop('disabled',true);
    $('#work_no').prop('disabled',false);
  }
  else
  {
    work_yes.prop('disabled',true);
    $('#work_no').prop('disabled',true);
  }

  $('#work_group').prop('disabled',true);
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

  $('#work_no').editableSelect();
  $('#work_group').editableSelect();

  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');

  province.on('change',function(){
    $.post('get_address/amphur/'+this.value,function(data){
      amphur.empty();
      $.each(data,function(key,value) {
        amphur.append('<option value="'+value.id+'">'+value.name+'</option>');
      });
    });
  });

  amphur.on('change',function(){
    $.post('get_address/district/'+this.value,function(data){
      district.empty();
      $.each(data,function(key,value) {
        district.append('<option value="'+value.id+'">'+value.name+'</option>');
      });
    });
  });
});
</script>
