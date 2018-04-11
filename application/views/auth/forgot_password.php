<div class="container">
  <div class="row" style="padding-top:10em;">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">
            <?php echo lang('forgot_password_heading');?>
            <small><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></small>
          </h3>
        </div>
        <div class="panel-body">
          <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("auth/forgot_password",array('class'=>'form-horizontal'));?>
          <div class="form-group">
            <label for="identity" class="control-label col-md-3">
              <?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?>
            </label>
            <div class="col-md-9">
              <?php echo form_input($identity,'',array('class'=>'form-control'));?>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-md-3"></label>
            <div class="col-md-9">
              <?php echo form_submit('submit', lang('forgot_password_submit_btn'),array('class'=>'btn btn-primary'));?></p>
            </div>
          </div>
        </div>
        <div class="panel-footer text-right">
          <p><a href="login"><?php echo lang('login_heading');?></a></p>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
