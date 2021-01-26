<div class="container">
  <div class="row" style="padding-top:1em;">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title"> เข้าสู่ระบบผู้ดูแล <small><?php echo lang('login_subheading');?></small> </h3> </div>
        <div class="panel-body">
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/login_admin",array('class'=>'form-horizontal','autocomplete'=>'off'));?>
          <div class="form-group"> <?php echo form_label('หมายเลขบัตรประชาชน:', 'identity',array('class'=>'control-label col-md-4'));?>
            <div class="col-md-8"> <?php echo form_input($identity,'',array('id'=>'identity','class'=>'form-control'));?> </div>
          </div>
          <div class="form-group"> <?php echo lang('login_password_label', 'password',array('class'=>'control-label col-md-4'));?>
            <div class="col-md-8"> <?php echo form_password($password,'',array('class'=>'form-control'));?> </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-offset-4"> <?php echo form_submit('submit', lang('login_submit_btn'), array('class'=>'btn btn-primary'));?> </div>
          </div>
          <?php echo form_close();?>
        </div>
        <div class="panel-footer">
          <a href="login">เข้าสู่ระบบบุคคลทั่วไป</a>
          <a href="register" class="pull-right"><?php echo lang('create_user_heading');?></a>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('_partials/messages'); ?>
</div>

<script type="text/javascript">
$(function(){
  $('#identity').inputmask('9999999999999');
});
</script>
