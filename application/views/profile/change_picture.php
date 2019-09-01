<?php $this->load->view('_partials/messages'); ?>
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">
      แก้ไขข้อมูลรูปภาพส่วนตัว
      <small>อัพโหลดไฟล์รูปภาพด้านล่างนี้</small>
    </h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <p class="">รูปภาพปัจจุบัน</p>
        <div class="thumbnail"> <img src="<?=base_url('uploads/profiles/'.$picture['file_name']);?>" class="img-responsive" alt=""> </div>
      </div>
    </div>
    <hr>
    <?php echo form_open_multipart(uri_string(),array('class'=>'form-horizontal'));?>
    <?php echo form_hidden('asset_id',$picture['id']);?>
    <?php echo form_hidden('asset_by_id',$picture['asset_by_id']);?>
    <?php echo form_hidden('file_name',$picture['file_name']);?>
    <div class="form-group">
      <?php echo form_label('รูปภาพประจำตัว','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_upload(array('name'=>'file','class'=>'form-control'));?>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('','',array('class'=>'control-label col-md-4'));?>
      <div class="col-md-8">
        <?php echo form_submit('','ยืนยัน',array('class'=>'btn btn-primary'));?>
      </div>
    </div>
  </div>
  <div class="panel-footer"> </div>
</div>
