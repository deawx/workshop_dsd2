<div class="container">
  <div class="row" style="padding-top:10em;">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-success">
        <div class="panel-heading"> <h3 class="panel-title"> <?php echo lang('login_heading');?> <small><?php echo lang('login_subheading');?></small> </h3> </div>
        <div class="panel-body">
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/login",array('class'=>'form-horizontal','autocomplete'=>'off'));?>
          <div class="form-group"> <?php echo form_label('หมายเลขบัตรประชาชน:', 'identity',array('class'=>'control-label col-md-4'));?>
            <div class="col-md-8"> <?php echo form_input(array('name'=>'identity','id'=>'identity','class'=>'form-control'));?> </div>
          </div>
          <div class="form-group"> <?php echo lang('login_password_label', 'password',array('class'=>'control-label col-md-4'));?>
            <div class="col-md-8"> <?php echo form_password(array('name'=>'password','class'=>'form-control'));?> </div>
          </div>
          <div class="form-group">
            <div class="col-md-8 col-md-offset-4"> <?php echo form_submit('submit', lang('login_submit_btn'), array('class'=>'btn btn-primary'));?> </div>
          </div>
          <?php echo form_close();?>
        </div>
        <div class="panel-footer">
          <a href="login_admin">เข้าสู่ระบบผู้ดูแล</a>
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
