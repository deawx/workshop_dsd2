<?php
$address = unserialize($user['address']);
$address_current = unserialize($user['address_current']);
$education = unserialize($user['education']);
$work = unserialize($user['work']);
?>
<div class="col-md-10 col-md-offset-1" style="margin-top:1em;">
  <?php $this->load->view('_partials/messages'); ?>
  <div class="panel panel-default">
    <div class="panel-heading"> <h3 class="panel-title">แก้ไขข้อมูลสมาชิก</h3> </div>
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$user['id']);?>
    <?=form_hidden('email_old', $user['email']);?>
    <div class="panel-body">
      <div class="form-group"> <?=form_label('ชื่อผู้ใช้','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$user['username']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อีเมล์','email',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'email','class'=>'form-control'),set_value('email',$user['email']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสผ่าน','password',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_password(array('name'=>'password','class'=>'form-control'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสผ่าน(ยืนยัน)','password_comfirm',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_password(array('name'=>'password_confirm','class'=>'form-control'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('วันที่สมัคร','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'','class'=>'form-control','value'=>date('d-m-Y',strtotime($user['date_create'])),'disabled'=>TRUE));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'phone','class'=>'form-control tel','maxlength'=>'10'),set_value('phone',$user['phone']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'fax','class'=>'form-control tel','maxlength'=>'10'),set_value('fax',$user['fax']));?> </div>
      </div>
      <hr>
      <div class="form-group"> <?=form_label('คำนำหน้าชื่อ*','title',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_dropdown(array('name'=>'title','class'=>'form-control'),dropdown_title(),set_value('title',$user['title']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อ*','firstname',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'firstname','class'=>'form-control'),set_value('firstname',$user['firstname']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('นามสกุล*','lastname',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'lastname','class'=>'form-control'),set_value('lastname',$user['lastname']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ชื่อ-นามสกุล(ภาษาอังกฤษ)*','lastname',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'englishname','class'=>'form-control'),set_value('englishname',$user['englishname']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('สัญชาติ*','nationality',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'nationality','class'=>'form-control'),set_value('nationality',$user['nationality']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ศาสนา*','religion',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'religion','class'=>'form-control'),set_value('religion',$user['religion']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('หมายเลขบัตรประชาชน*','id_card',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'id_card','class'=>'form-control','id'=>'id_card','maxlength'=>'13','readonly'=>TRUE),set_value('id_card',$user['id_card']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ว/ด/ป เกิด*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-3">
          <?php $d = array(''=>'วัน');
          foreach (range('1','31') as $value) $d[$value] = $value;
          echo form_dropdown(array('name'=>'d','class'=>'form-control'),$d,set_value('d',explode('-',$user['birthdate'])[2]));?>
        </div>
        <div class="col-md-3">
          <?=form_dropdown(array('name'=>'m','class'=>'form-control'),dropdown_month(),set_value('m',explode('-',$user['birthdate'])[1]));?>
        </div>
        <div class="col-md-3">
          <?php $y = array(''=>'ปี พ.ศ.');
          foreach (range('2500',(date('Y')+543)) as $value) $y[$value] = $value;
          echo form_dropdown(array('name'=>'y','class'=>'form-control'),$y,set_value('y',explode('-',$user['birthdate'])[0]));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('หมู่โลหิต*','blood',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'blood','class'=>'form-control'),set_value('blood',$user['blood']));?> </div>
      </div>
      <hr>
      <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ตามทะเบียนบ้าน)*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'address[address]','class'=>'form-control'),set_value('address[address]',$address['address']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'address[street]','class'=>'form-control'),set_value('address[street]',$address['street']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_dropdown(array('name'=>'address[province]','class'=>'form-control','id'=>'province'),dropdown_province(),set_value('address[province]',$address['province']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_dropdown(array('name'=>'address[amphur]','class'=>'form-control','id'=>'amphur'),dropdown_amphur(),set_value('address[amphur]',$address['amphur']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_dropdown(array('name'=>'address[tambon]','class'=>'form-control','id'=>'district'),dropdown_district(),set_value('address[tambon]',$address['tambon']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสไปรษณีย์*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'address[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address[zip]',$address['zip']));?> </div>
      </div>
      <hr>
      <div class="form-group"> <?=form_label('','exist',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9">
          <div class="checkbox"> <label> <?=form_checkbox(array('name'=>'exist','id'=>'exist'),'1',set_checkbox('exist','1',($user['address_current'])));?> ใช้ที่อยู่ตามทะเบียนบ้าน </label> </div>
        </div>
      </div>
      <div id="exist_ctn">
        <div class="form-group"> <?=form_label('ที่อยู่เลขที่(ปัจจุบัน)','address_current',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'address_current[address]','class'=>'form-control'),set_value('address_current[address]',$address_current['address']));?> </div>
        </div>
        <div class="form-group"> <?=form_label('ถนน','',array('class'=>'control-label col-md-3'));?>
          <div class="col-md-9"> <?=form_input(array('name'=>'address_current[street]','class'=>'form-control'),set_value('address_current[street]',$address_current['street']));?> </div>
        </div>
        <div class="form-group"> <?=form_label('จังหวัด','',array('class'=>'control-label col-md-3'));?>
          <div class="col-md-9"> <?=form_dropdown(array('name'=>'address_current[province]','class'=>'form-control','id'=>'province_current'),dropdown_province(),set_value('address_current[province]',$address_current['province']));?> </div>
        </div>
        <div class="form-group"> <?=form_label('อำเภอ','',array('class'=>'control-label col-md-3'));?>
          <div class="col-md-9"> <?=form_dropdown(array('name'=>'address_current[amphur]','class'=>'form-control','id'=>'amphur_current'),dropdown_amphur(),set_value('address_current[amphur]',$address_current['amphur']));?> </div>
        </div>
        <div class="form-group"> <?=form_label('ตำบล','',array('class'=>'control-label col-md-3'));?>
          <div class="col-md-9"> <?=form_dropdown(array('name'=>'address_current[tambon]','class'=>'form-control','id'=>'district_current'),dropdown_district(),set_value('address_current[tambon]',$address_current['tambon']));?> </div>
        </div>
        <div class="form-group"> <?=form_label('รหัสไปรษณีย์','',array('class'=>'control-label col-md-3'));?>
          <div class="col-md-9"> <?=form_input(array('name'=>'address_current[zip]','class'=>'form-control zip','maxlength'=>'5'),set_value('address_current[zip]',$address_current['zip']));?> </div>
        </div>
      </div>
      <hr>
      <div class="form-group"> <?=form_label('ระดับการศึกษาสูงสุด*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9">
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
          echo form_dropdown(array('name'=>'education[degree]','class'=>'form-control'),$e,set_value('education[degree]',$education['degree']));?>
        </div>
      </div>
      <div class="form-group"> <?=form_label('สาขาวิชา*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'education[department]','class'=>'form-control'),set_value('education[department]',$education['department']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('สถานศึกษา*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_input(array('name'=>'education[place]','class'=>'form-control'),set_value('education[place]',$education['place']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('จังหวัด*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9"> <?=form_dropdown(array('name'=>'education[province]','class'=>'form-control'),dropdown_province(),set_value('education[province]',$education['province']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('ปี พ.ศ.ที่สำเร็จ*','',array('class'=>'control-label col-md-3'));?>
        <div class="col-md-9">
          <?php $y = array(''=>'ปี');
          foreach (range((date('Y')+543),'2520') as $value) $y[$value] = $value;
          echo form_dropdown(array('name'=>'education[year]','class'=>'form-control'),$y,set_value('education[year]',$education['year']));?>
        </div>
      </div>

    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-3'));?>
      <div class="col-md-9">
        <?=form_submit('','บันทึก',array('class'=>'btn btn-primary'));?>
        <?=form_button('','ย้อนกลับ',array('class'=>'btn btn-default','onclick'=>'window.history.back()'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
</div>

<script type="text/javascript">
$(function(){
  var exist = $('#exist');
  var exist_ctn = $('div#exist_ctn :input');

  <?php if ( ! $user['address_current']) : ?>
    exist.prop('checked',true);
    exist_ctn.prop('disabled',true);
  <?php endif; ?>
  exist.on('change',function(){
    if (this.checked) {
      exist_ctn.prop('disabled',true);
    } else {
      exist_ctn.prop('disabled',false);
    }
  });

  $('.zip').inputmask('99999');
  $('.tel').inputmask('9999999999');

});
</script>
