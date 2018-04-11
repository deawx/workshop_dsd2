<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> แก้ไขข้อมูลบัญชี <small><?php echo lang('edit_user_subheading');?></small> </h3> </div>
  <div class="panel-body">
    <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?php echo form_hidden('id', $user['id']);?>
    <?php echo form_hidden('email_old', $user['email']);?>
    <div class="form-group"> <?php echo form_label('ชื่อผู้ใช้','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE),set_value('',$user['username']));?> </div>
    </div>
    <div class="form-group"> <?php echo form_label('อีเมล์*','email',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php echo form_input(array('name'=>'email','class'=>'form-control'),set_value('email',$user['email']));?> </div>
    </div>
    <div class="form-group"> <?php echo form_label('วันที่สมัคร','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php echo form_input(array('name'=>'','class'=>'form-control','disabled'=>TRUE,'value'=>$user['date_create']));?> </div>
    </div>
    <div class="form-group"> <?php echo form_label('โทรศัพท์*','phone',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php echo form_input(array('name'=>'phone','class'=>'form-control tel','maxlength'=>'10'),set_value('phone',$user['phone']));?> </div>
    </div>
    <div class="form-group"> <?php echo form_label('โทรสาร','fax',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?php echo form_input(array('name'=>'fax','class'=>'form-control tel','maxlength'=>'10'),set_value('fax',$user['fax']));?> </div>
    </div>
    <div class="form-group"> <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?php echo form_reset('','ล้าง',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?php echo form_close();?>
  </div>
  <div class="panel-footer"> <?php $this->load->view('_partials/messages'); ?> </div>
</div>

<script type="text/javascript">
$(function(){
  $('.tel').inputmask('9999999999');
});
</script>
