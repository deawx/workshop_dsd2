<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> <?=lang('edit_user_heading');?> <small><?=lang('edit_user_subheading');?></small> </h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id', $user['id']);?>
    <div class="form-group"> <?=form_label('รหัสผ่านเก่า','old_password',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'old_password','id'=>'old_password','class'=>'form-control','maxlength'=>'8'),set_value('old_password'));?> </div>
    </div>
    <div class="form-group">
      <label for="new_password"> </label>
      <?=form_label('รหัสผ่านใหม่','password',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'password','id'=>'password','class'=>'form-control','maxlength'=>'8'),set_value('password'));?> </div>
    </div>
    <div class="form-group"> <?=form_label('รหัสผ่านใหม่(ยืนยัน)','password_confirm',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_input(array('name'=>'password_confirm','id'=>'password_confirm','class'=>'form-control','maxlength'=>'8'),set_value('password_confirm'));?> </div>
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