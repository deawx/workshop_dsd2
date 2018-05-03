<div class="col-md-6 col-md-offset-3" style="margin-top:1em;">
  <div class="panel panel-default">
    <div class="panel-heading"> <h3 class="panel-title">แก้ไขข้อมูลสมาชิก</h3> </div>
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id',$user['id']);?>
    <?=form_hidden('email_old', $user['email']);?>
    <div class="panel-body">
      <div class="form-group"> <?=form_label('ชื่อผู้ใช้','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$user['username']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('อีเมล์','email',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'email','class'=>'form-control'),set_value('email',$user['email']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสผ่าน','password',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_password(array('name'=>'password','class'=>'form-control'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('รหัสผ่าน(ยืนยัน)','password_comfirm',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_password(array('name'=>'password_confirm','class'=>'form-control'));?> </div>
      </div>
      <div class="form-group"> <?=form_label('วันที่สมัคร','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$user['date_create']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('เข้าใช้ล่าสุด','',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$user['last_login']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรศัพท์','phone',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'phone','class'=>'form-control tel','maxlength'=>'10'),set_value('phone',$user['phone']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_input(array('name'=>'fax','class'=>'form-control tel','maxlength'=>'10'),set_value('fax',$user['fax']));?> </div>
      </div>
      <div class="form-group"> <?=form_label('สถานะ','is_active',array('class'=>'control-label col-md-4'));?>
        <div class="col-md-8"> <?=form_dropdown('is_active',array('0'=>'ปิดใช้งาน','1'=>'เปิดใช้งาน'),isset($user['is_active'])?$user['is_active']:'',array('class'=>'form-control'));?> </div>
      </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?=form_submit('','บันทึก',array('class'=>'btn btn-primary'));?>
        <?=form_button('','ย้อนกลับ',array('class'=>'btn btn-default','onclick'=>'window.history.back()'));?>
      </div>
    </div>
    <div class="panel-footer"> <?php $this->load->view('_partials/messages'); ?> </div>
    <?=form_close();?>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $('.tel').inputmask('9999999999');
});
</script>
