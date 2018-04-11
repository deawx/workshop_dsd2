<div class="panel panel-success">
  <div class="panel-heading"> <h3 class="panel-title"> <?=lang('edit_user_heading');?> <small><?=lang('edit_user_subheading');?></small> </h3> </div>
  <div class="panel-body">
    <?=form_open(uri_string(),array('class'=>'form-horizontal'));?>
    <?=form_hidden('id', $user['id']);?>
    <div class="form-group"> <?=form_label('รหัสผ่านเก่า','old_password',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_password(array('name'=>'old_password','class'=>'form-control'));?> </div>
    </div>
    <div class="form-group">
      <label for="new_password"> </label>
      <?=form_label('รหัสผ่านใหม่','password',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_password(array('name'=>'password','class'=>'form-control'));?> </div>
    </div>
    <div class="form-group"> <?=form_label('รหัสผ่านใหม่(ยืนยัน)','password_confirm',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8"> <?=form_password(array('name'=>'password_confirm','class'=>'form-control'));?> </div>
    </div>
    <div class="form-group"> <?=form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?=form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
        <?=form_reset('','ล้าง',array('class'=>'btn btn-default'));?>
      </div>
    </div>
    <?=form_close();?>
  </div>
  <div class="panel-footer"> <?php $this->load->view('_partials/messages'); ?> </div>
</div>
